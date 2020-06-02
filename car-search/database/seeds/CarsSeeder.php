<?php

use App\Helper\CrawlerHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->_getCrawlerData();
        DB::table('cars')->insert($data);
    }


    protected function _getCrawlerData()
    {
        $data = [];
        $crawlerHelper = new CrawlerHelper();
        $urls = $crawlerHelper->getUrls();

        foreach ($urls as $url) {
            $crawler = $crawlerHelper->crawler('https://seminovos.com.br' . $url);
            if (!is_object($crawler)) {
                unset($crawler);
                continue;
            }

            try {
                $result =  $crawler->filter('.veiculo-conteudo [itemtype="http://schema.org/Car"]');

                $data[] = [
                    'sku' => $result->filter('[itemprop="sku"]')->text(''),
                    'name' => $result->filter('[itemprop="name"]')->text(''),
                    'url' => $result->filter('[itemprop="url"]')->extract(['content'])[0],
                    'image' => $result->filter('[itemprop="image"]')->extract(['src'])[0],
                    'bodyType' => $result->filter('[itemprop="bodyType"]')->text(''),
                    'brand' => $result->filter('[itemprop="brand"]')->text(''),
                    'model' => $result->filter('[itemprop="model"]')->text(''),
                    'description' => $result->filter('[itemprop="description"]')->text(''),
                    'mileage' => $result->filter('[itemprop="mileageFromOdometer"]')->text(''),
                    'color' => $result->filter('[itemprop="color"]')->text(''),
                    'price' => $result->filter('[itemprop="price"]')->text(''),
                    'priceCurrency' => $result->filter('[itemprop="priceCurrency"]')->extract(['content'])[0],
                    'modelDate' => $result->filter('[itemprop="modelDate"]')->text(''),
                    'fuelType' => $result->filter('[itemprop="fuelType"]')->text(''),
                    'doors' => (int) $result->filter('[title="Portas"]')->text(0),
                ];
            } catch (Exception $e) {
                echo $e->xdebug_message;
                //var_dump($e);
            } finally {
                unset($crawler);
                unset($result);
            }
        }
        return $data;
    }
}
