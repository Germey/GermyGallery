<?php

    use App\Model\Config;
    use Illuminate\Database\Seeder;

    class ConfigTableSeeder extends Seeder
    {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            DB::table('configs')->delete();

            Config::create([
                'type' => 'color',
                'key' => 'panel_color',
                'value' => 'rgba(255,255,255,0.3)',
                'title' => '展示板颜色',
                'description' => '修改展示板的颜色'
            ]);
            Config::create([
                'type' => 'color',
                'key' => 'bar_color',
                'value' => 'rgba(255,255,255,0.3)',
                'title' => '时间轴颜色',
                'description' => '修改时间轴的颜色'
            ]);
            Config::create([
                'type' => 'color',
                'key' => 'icon_border_color',
                'value' => 'rgba(255,255,255,0.3)',
                'title' => '图标边界颜色',
                'description' => '修改图标边界的颜色'
            ]);
            Config::create([
                'type' => 'color',
                'key' => 'title_color',
                'value' => 'rgba(255,255,255,0.3)',
                'title' => '标题颜色',
                'description' => '修改标题颜色'
            ]);
            Config::create([
                'type' => 'color',
                'key' => 'description_color',
                'value' => 'rgba(255,255,255,0.3)',
                'title' => '正文颜色',
                'description' => '修改正文颜色'
            ]);
            Config::create([
                'type' => 'color',
                'key' => 'location_color',
                'value' => 'rgba(255,255,255,0.3)',
                'title' => '地点颜色',
                'description' => '修改地点颜色'
            ]);
            Config::create([
                'type' => 'color',
                'key' => 'date_color',
                'value' => 'rgba(255,255,255,0.3)',
                'title' => '日期颜色',
                'description' => '修改日期颜色'
            ]);
            Config::create([
                'type' => 'text',
                'key' => 'title',
                'value' => '记忆画廊',
                'title' => '站点标题',
                'description' => '修改站点标题'
            ]);
            Config::create([
                'type' => 'text',
                'key' => 'description',
                'value' => '保存你的珍藏记忆',
                'title' => '站点描述',
                'description' => '修改站点描述'
            ]);
            Config::create([
                'type' => 'pic',
                'key' => 'bg_img',
                'value' => '/img/background.jpg',
                'title' => '背景图',
                'description' => '修改背景图片'
            ]);
            Config::create([
                'type' => 'select',
                'key' => 'is_open',
                'value' => '0',
                'title' => '是否公开',
                'description' => '设置是否公开'
            ]);
            Config::create([
                'type' => 'array',
                'key' => 'auth_kind',
                'value' => [
                    'admin' => '管理员',
                    'guest' => '游客',
                ],
            ]);
            Config::create([
                'type' => 'array',
                'key' => 'open_map',
                'value' => [
                    '1' => '开放',
                    '0' => '需密钥',
                ],
            ]);
            Config::create([
                'type' => 'site',
                'key' => 'skin',
                'value' => 'blue-skin'
            ]);
            Config::create([
                'type' => 'array',
                'key' => 'images_anim',
                'value' => [
                    'random' => '随机动画',
                    'sim-anim-1' => '圆周绽放',
                    'sim-anim-2' => '旋转长廊',
                    'sim-anim-3' => '扇面展开',
                    'sim-anim-4' => '抛砖引玉',
                    'sim-anim-5' => '陀螺飞旋',
                    'sim-anim-6' => '经典画布',
                    'sim-anim-7' => '国画长卷',
                    'sim-anim-8' => '大鹏展翅',
                    'sim-anim-9' => '影院巨幕',
                ]
            ]);
        }

    }