<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RaceLapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('race_laps')->insert([
            ['hora' => '23:49:08.277', 'piloto' => '038 – F.MASSA', 'volta' => 1, 'tempo' => '00:01:02.852', 'velocidade' => 44.275],
            ['hora' => '23:49:10.858', 'piloto' => '033 – R.BARRICHELLO', 'volta' => 1, 'tempo' => '00:01:04.352', 'velocidade' => 43.243],
            ['hora' => '23:49:11.075', 'piloto' => '002 – K.RAIKKONEN', 'volta' => 1, 'tempo' => '00:01:04.108', 'velocidade' => 43.408],
            ['hora' => '23:49:12.667', 'piloto' => '023 – M.WEBBER', 'volta' => 1, 'tempo' => '00:01:04.414', 'velocidade' => 43.202],
            ['hora' => '23:49:30.976', 'piloto' => '015 – F.ALONSO', 'volta' => 1, 'tempo' => '00:01:18.456', 'velocidade' => 35.470],
            ['hora' => '23:50:11.447', 'piloto' => '038 – F.MASSA', 'volta' => 2, 'tempo' => '00:01:03.170', 'velocidade' => 44.053],
            ['hora' => '23:50:14.860', 'piloto' => '033 – R.BARRICHELLO', 'volta' => 2, 'tempo' => '00:01:04.002', 'velocidade' => 43.480],
            ['hora' => '23:50:15.057', 'piloto' => '002 – K.RAIKKONEN', 'volta' => 2, 'tempo' => '00:01:03.982', 'velocidade' => 43.493],
            ['hora' => '23:50:17.472', 'piloto' => '023 – M.WEBBER', 'volta' => 2, 'tempo' => '00:01:04.805', 'velocidade' => 42.941],
            ['hora' => '23:50:37.987', 'piloto' => '015 – F.ALONSO', 'volta' => 2, 'tempo' => '00:01:07.011', 'velocidade' => 41.528],
            ['hora' => '23:51:14.216', 'piloto' => '038 – F.MASSA', 'volta' => 3, 'tempo' => '00:01:02.769', 'velocidade' => 44.334],
            ['hora' => '23:51:18.576', 'piloto' => '033 – R.BARRICHELLO', 'volta' => 3, 'tempo' => '00:01:03.716', 'velocidade' => 43.675],
            ['hora' => '23:51:19.044', 'piloto' => '002 – K.RAIKKONEN', 'volta' => 3, 'tempo' => '00:01:03.987', 'velocidade' => 43.490],
            ['hora' => '23:51:21.759', 'piloto' => '023 – M.WEBBER', 'volta' => 3, 'tempo' => '00:01:04.287', 'velocidade' => 43.287],
            ['hora' => '23:51:46.691', 'piloto' => '015 – F.ALONSO', 'volta' => 3, 'tempo' => '00:01:08.704', 'velocidade' => 40.504],
            ['hora' => '23:52:01.796', 'piloto' => '011 – S.VETTEL', 'volta' => 1, 'tempo' => '00:03:31.315', 'velocidade' => 13.169],
            ['hora' => '23:52:17.003', 'piloto' => '038 – F.MASSA', 'volta' => 4, 'tempo' => '00:01:02.787', 'velocidade' => 44.321],
            ['hora' => '23:52:22.586', 'piloto' => '033 – R.BARRICHELLO', 'volta' => 4, 'tempo' => '00:01:04.010', 'velocidade' => 43.474],
            ['hora' => '23:52:22.120', 'piloto' => '002 – K.RAIKKONEN', 'volta' => 4, 'tempo' => '00:01:03.076', 'velocidade' => 44.118],
            ['hora' => '23:52:25.975', 'piloto' => '023 – M.WEBBER', 'volta' => 4, 'tempo' => '00:01:04.216', 'velocidade' => 43.335],
            ['hora' => '23:53:06.741', 'piloto' => '015 – F.ALONSO', 'volta' => 4, 'tempo' => '00:01:20.050', 'velocidade' => 34.763],
            ['hora' => '23:53:39.660', 'piloto' => '011 – S.VETTEL', 'volta' => 2, 'tempo' => '00:01:37.864', 'velocidade' => 28.435],
            ['hora' => '23:54:57.757', 'piloto' => '011 – S.VETTEL', 'volta' => 3, 'tempo' => '00:01:18.097', 'velocidade' => 35.633],
        ]);
    }
}
