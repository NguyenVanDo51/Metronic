<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class HomeController
{
    /**
     * @param Request $request
     * @param Arr $data
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $param = [
            'start_date' => $request->get('start_date', date('Y-m-d')),
            'end_date' => $request->get('end_date', date('Y-m-d')),
            'campaign_id' => $request->get('campaign_id'),
            'advertiser_id' => $request->get('advertiser_id'),
            'country' => $request->get('country')
        ];

        $query = [
            'start_date' => strtotime($param['start_date']) * 1000,
            'end_date' => strtotime($param['end_date']) * 1000,
            'group_by_fields' => 'campaign_id',
        ];

        $url = 'http://campaign-rest-kr3s8j0c.dev.pushtimize.com/campaign_reports/groups?' . http_build_query($query);

        // Neu tim kiem theo IDs
        if (!empty($param['campaign_id'])) {
            $data = $this->getDataWithIds($param, $url);
        } else {
            // Neu loc campaigns theo thong tin khac
            $data = $this->getDataWithOthers($param, $url);
        }

        return view('pages.home', compact('param', 'data'));
    }

    // Get data with ids
    public function getDataWithIds($param, $url)
    {
        // Tim kiem theo camppaign ids
        $campaigns = Http::withBasicAuth('admin', 'gcek0dpy742zu69i')
            ->post('http://campaign-rest-kr3s8j0c.dev.pushtimize.com/campaigns/findAllByFilter', [
                "ids" => explode(',', $param['campaign_id'])
            ])->body();

        $campaigns = json_decode($campaigns, true)['data'];

        $data = collect($campaigns);

        foreach ($campaigns as $index => $campaign) {
            $click_info = Http::withBasicAuth('admin', 'gcek0dpy742zu69i')
                ->post($url, [
                    "campaign_ids" => [$campaign['id']]
                ])->body();
            $var = json_decode($click_info, true)['data'];
            $data[$index] = $var[0];
            $data[$index] = Arr::add($data[$index], 'campaign_info', $campaign);
        }

        return $data;
    }

    /**
     * Get data with info other
     * @param array $param
     * @param string $url
     * @return \Illuminate\Support\Collection
     */
    public function getDataWithOthers(array $param, string $url)
    {
        $data = Http::withBasicAuth('admin', 'gcek0dpy742zu69i')
            ->post($url, [
                "ids" => $param['campaign_id'],
                "country_code" => $param['country'],
                "advertiser_id" => $param['advertiser_id']
            ])->body();
        $data = collect(json_decode($data, true)['data']);

        // Lay het ID roi query 1 lan
        $ids = $data->pluck('_id');

        if (count($ids) > 0) {
            $campaigns = Http::withBasicAuth('admin', 'gcek0dpy742zu69i')
                ->post('http://campaign-rest-kr3s8j0c.dev.pushtimize.com/campaigns/findAllByFilter', [
                    "ids" => $ids,
                ]);
            $campaigns = json_decode($campaigns->body(), true)['data'];

            // Hop nhat $group va $data thong qua id
            foreach ($data as $index => $item) {
                foreach ($campaigns as $campaign) {
                    // Neu id bang nhau thi them campaign
                    if ($item['_id'] == $campaign['id']) {
                        $data[$index] = Arr::add($item, 'campaign_info', $campaign);
                        break;
                    } else {
                        unset($data[$index]);
                    }
                }
            }
        }
        return $data;
    }

}
