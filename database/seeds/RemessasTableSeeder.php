<?php

use Illuminate\Database\Seeder;

class RemessasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        DB::table('remessas')->delete();

        DB::table('remessas')->insert(array (
            0 =>
            array (
                'id' => 1,
                'data' => '2016-01-20 19:38:39',
                'id_usuario' => '2',
                'nome' => 'CB200101.REM',
                'sequencia' => '2',
                'id_conta' => 2,
            ),
            1 =>
            array (
                'id' => 2,
                'data' => '2016-01-25 14:10:52',
                'id_usuario' => '2',
                'nome' => 'CB250103.REM',
                'sequencia' => '3',
                'id_conta' => 2,
            ),
            2 =>
            array (
                'id' => 3,
                'data' => '2016-01-27 20:21:25',
                'id_usuario' => '0',
                'nome' => 'CB270104.REM',
                'sequencia' => '1',
                'id_conta' => 2,
            ),
            3 =>
            array (
                'id' => 4,
                'data' => '2016-01-28 12:13:07',
                'id_usuario' => '2',
                'nome' => 'CB280105.REM',
                'sequencia' => '5',
                'id_conta' => 1,
            ),
            4 =>
            array (
                'id' => 5,
                'data' => '2016-01-29 14:41:53',
                'id_usuario' => '2',
                'nome' => 'CB290106.REM',
                'sequencia' => '6',
                'id_conta' => 2,
            ),
            5 =>
            array (
                'id' => 6,
                'data' => '2016-02-02 17:23:35',
                'id_usuario' => '2',
                'nome' => 'CB020207.REM',
                'sequencia' => '7',
                'id_conta' => 2,
            ),
            6 =>
            array (
                'id' => 7,
                'data' => '2016-02-05 17:53:33',
                'id_usuario' => '2',
                'nome' => 'CB050208.REM',
                'sequencia' => '1',
                'id_conta' => 2,
            ),
            7 =>
            array (
                'id' => 8,
                'data' => '2016-02-10 20:12:58',
                'id_usuario' => '0',
                'nome' => 'CB1002',
                'sequencia' => '9',
                'id_conta' => 2,
            ),
            8 =>
            array (
                'id' => 9,
                'data' => '2016-02-11 17:30:39',
                'id_usuario' => '2',
                'nome' => 'CB110210.REM',
                'sequencia' => '10',
                'id_conta' => 2,
            ),
            9 =>
            array (
                'id' => 10,
                'data' => '2016-02-14 10:56:28',
                'id_usuario' => '2',
                'nome' => 'CB140211.REM',
                'sequencia' => '11',
                'id_conta' => 2,
            ),
            10 =>
            array (
                'id' => 11,
                'data' => '2016-02-18 05:35:33',
                'id_usuario' => '2',
                'nome' => 'CB180212.REM',
                'sequencia' => '12',
                'id_conta' => 2,
            ),
            11 =>
            array (
                'id' => 12,
                'data' => '2016-02-18 18:59:58',
                'id_usuario' => '2',
                'nome' => 'CB180213.REM',
                'sequencia' => '13',
                'id_conta' => 2,
            ),
            12 =>
            array (
                'id' => 13,
                'data' => '2016-02-21 18:37:17',
                'id_usuario' => '2',
                'nome' => 'CB210214.REM',
                'sequencia' => '14',
                'id_conta' => 2,
            ),
            13 =>
            array (
                'id' => 14,
                'data' => '2016-02-23 20:27:08',
                'id_usuario' => '2',
                'nome' => 'CB230215.REM',
                'sequencia' => '15',
                'id_conta' => 2,
            ),
            14 =>
            array (
                'id' => 15,
                'data' => '2016-02-26 11:00:33',
                'id_usuario' => '0',
                'nome' => 'CB260216.REM',
                'sequencia' => '16',
                'id_conta' => 2,
            ),
            15 =>
            array (
                'id' => 16,
                'data' => '2016-02-28 19:25:52',
                'id_usuario' => '2',
                'nome' => 'CB280217.REM',
                'sequencia' => '17',
                'id_conta' => 2,
            ),
            16 =>
            array (
                'id' => 17,
                'data' => '2016-03-01 15:24:59',
                'id_usuario' => '2',
                'nome' => 'CB010318.REM',
                'sequencia' => '3',
                'id_conta' => 2,
            ),
            17 =>
            array (
                'id' => 18,
                'data' => '2016-03-03 08:07:53',
                'id_usuario' => '2',
                'nome' => 'CB030319.REM',
                'sequencia' => '19',
                'id_conta' => 2,
            ),
            18 =>
            array (
                'id' => 19,
                'data' => '2016-03-03 18:36:36',
                'id_usuario' => '2',
                'nome' => 'CB030320.REM',
                'sequencia' => '20',
                'id_conta' => 2,
            ),
            19 =>
            array (
                'id' => 20,
                'data' => '2016-03-04 11:04:58',
                'id_usuario' => '0',
                'nome' => 'CB040321.REM',
                'sequencia' => '21',
                'id_conta' => 2,
            ),
            20 =>
            array (
                'id' => 21,
                'data' => '2016-03-07 17:24:01',
                'id_usuario' => '2',
                'nome' => 'CB070322.REM',
                'sequencia' => '22',
                'id_conta' => 2,
            ),
            21 =>
            array (
                'id' => 22,
                'data' => '2016-03-10 14:28:57',
                'id_usuario' => '2',
                'nome' => 'CB100323.REM',
                'sequencia' => '23',
                'id_conta' => 2,
            ),
            22 =>
            array (
                'id' => 23,
                'data' => '2016-03-12 09:54:46',
                'id_usuario' => '2',
                'nome' => 'CB120324.REM',
                'sequencia' => '24',
                'id_conta' => 2,
            ),
            23 =>
            array (
                'id' => 24,
                'data' => '2016-03-12 18:41:23',
                'id_usuario' => '2',
                'nome' => 'CB120325.REM',
                'sequencia' => '25',
                'id_conta' => 2,
            ),
            24 =>
            array (
                'id' => 25,
                'data' => '2016-03-14 17:59:59',
                'id_usuario' => '2',
                'nome' => 'CB140326.REM',
                'sequencia' => '26',
                'id_conta' => 2,
            ),
            25 =>
            array (
                'id' => 26,
                'data' => '2016-03-16 21:40:28',
                'id_usuario' => '2',
                'nome' => 'CB160327.REM',
                'sequencia' => '27',
                'id_conta' => 2,
            ),
            26 =>
            array (
                'id' => 27,
                'data' => '2016-03-18 19:27:22',
                'id_usuario' => '2',
                'nome' => 'CB180328.REM',
                'sequencia' => '28',
                'id_conta' => 2,
            ),
            27 =>
            array (
                'id' => 28,
                'data' => '2016-03-21 09:51:41',
                'id_usuario' => '2',
                'nome' => 'CB210329.REM',
                'sequencia' => '29',
                'id_conta' => 2,
            ),
            28 =>
            array (
                'id' => 29,
                'data' => '2016-03-22 20:30:11',
                'id_usuario' => '0',
                'nome' => 'CB220330.REM',
                'sequencia' => '30',
                'id_conta' => 2,
            ),
            29 =>
            array (
                'id' => 30,
                'data' => '2016-03-23 12:22:26',
                'id_usuario' => '2',
                'nome' => 'CB230331.REM',
                'sequencia' => '31',
                'id_conta' => 2,
            ),
            30 =>
            array (
                'id' => 31,
                'data' => '2016-03-26 18:35:10',
                'id_usuario' => '2',
                'nome' => 'CB260332.REM',
                'sequencia' => '32',
                'id_conta' => 2,
            ),
            31 =>
            array (
                'id' => 32,
                'data' => '2016-03-27 12:06:47',
                'id_usuario' => '2',
                'nome' => 'CB270333.REM',
                'sequencia' => '33',
                'id_conta' => 2,
            ),
            32 =>
            array (
                'id' => 33,
                'data' => '2016-03-30 09:41:34',
                'id_usuario' => '2',
                'nome' => 'CB300334.REM',
                'sequencia' => '5',
                'id_conta' => 2,
            ),
            33 =>
            array (
                'id' => 34,
                'data' => '2016-04-04 08:46:05',
                'id_usuario' => '2',
                'nome' => 'CB040435.REM',
                'sequencia' => '35',
                'id_conta' => 1,
            ),
            34 =>
            array (
                'id' => 35,
                'data' => '2016-04-04 08:46:24',
                'id_usuario' => '2',
                'nome' => 'CB0404',
                'sequencia' => '36',
                'id_conta' => 2,
            ),
            35 =>
            array (
                'id' => 36,
                'data' => '2016-04-05 09:17:49',
                'id_usuario' => '2',
                'nome' => 'CB050437.REM',
                'sequencia' => '37',
                'id_conta' => 1,
            ),
            36 =>
            array (
                'id' => 37,
                'data' => '2016-04-10 09:21:20',
                'id_usuario' => '2',
                'nome' => 'CB100438.REM',
                'sequencia' => '38',
                'id_conta' => 1,
            ),
            37 =>
            array (
                'id' => 38,
                'data' => '2016-04-22 12:50:54',
                'id_usuario' => '2',
                'nome' => 'CB220439.REM',
                'sequencia' => '39',
                'id_conta' => 1,
            ),
            38 =>
            array (
                'id' => 39,
                'data' => '2016-04-28 15:27:20',
                'id_usuario' => '2',
                'nome' => 'CB2804',
                'sequencia' => '6',
                'id_conta' => 1,
            ),
            39 =>
            array (
                'id' => 40,
                'data' => '2016-05-03 11:21:40',
                'id_usuario' => '2',
                'nome' => 'CB030541.REM',
                'sequencia' => '41',
                'id_conta' => 1,
            ),
            40 =>
            array (
                'id' => 41,
                'data' => '2016-05-05 17:23:43',
                'id_usuario' => '2',
                'nome' => 'CB050542.REM',
                'sequencia' => '7',
                'id_conta' => 1,
            ),
            41 =>
            array (
                'id' => 42,
                'data' => '2016-05-10 13:19:06',
                'id_usuario' => '2',
                'nome' => 'CB100543.REM',
                'sequencia' => '43',
                'id_conta' => 1,
            ),
            42 =>
            array (
                'id' => 43,
                'data' => '2016-05-12 10:38:53',
                'id_usuario' => '2',
                'nome' => 'CB120544.REM',
                'sequencia' => '44',
                'id_conta' => 1,
            ),
            43 =>
            array (
                'id' => 44,
                'data' => '2016-05-15 18:35:55',
                'id_usuario' => '2',
                'nome' => 'CB150545.REM',
                'sequencia' => '45',
                'id_conta' => 1,
            ),
            44 =>
            array (
                'id' => 45,
                'data' => '2016-05-19 10:45:09',
                'id_usuario' => '2',
                'nome' => 'CB190546.REM',
                'sequencia' => '46',
                'id_conta' => 1,
            ),
            45 =>
            array (
                'id' => 46,
                'data' => '2016-05-21 10:26:54',
                'id_usuario' => '2',
                'nome' => 'CB210547.REM',
                'sequencia' => '47',
                'id_conta' => 1,
            ),
            46 =>
            array (
                'id' => 47,
                'data' => '2016-05-27 11:10:19',
                'id_usuario' => '2',
                'nome' => 'CB270548.REM',
                'sequencia' => '48',
                'id_conta' => 1,
            ),
            47 =>
            array (
                'id' => 48,
                'data' => '2016-05-30 19:44:34',
                'id_usuario' => '2',
                'nome' => 'CB3005',
                'sequencia' => '49',
                'id_conta' => 1,
            ),
            48 =>
            array (
                'id' => 49,
                'data' => '2016-06-01 14:25:50',
                'id_usuario' => '2',
                'nome' => 'CB010650.REM',
                'sequencia' => '50',
                'id_conta' => 2,
            ),
            49 =>
            array (
                'id' => 50,
                'data' => '2016-06-02 18:57:06',
                'id_usuario' => '0',
                'nome' => 'CB020651.REM',
                'sequencia' => '51',
                'id_conta' => 2,
            ),
            50 =>
            array (
                'id' => 51,
                'data' => '2016-06-07 18:04:48',
                'id_usuario' => '2',
                'nome' => 'CB070652.REM',
                'sequencia' => '52',
                'id_conta' => 1,
            ),
            51 =>
            array (
                'id' => 52,
                'data' => '2016-06-10 09:40:51',
                'id_usuario' => '2',
                'nome' => 'CB1006',
                'sequencia' => '53',
                'id_conta' => 2,
            ),
            52 =>
            array (
                'id' => 53,
                'data' => '2016-06-13 16:27:09',
                'id_usuario' => '2',
                'nome' => 'CB130654.REM',
                'sequencia' => '54',
                'id_conta' => 2,
            ),
            53 =>
            array (
                'id' => 54,
                'data' => '2016-06-14 17:58:38',
                'id_usuario' => '2',
                'nome' => 'CB140655.REM',
                'sequencia' => '55',
                'id_conta' => 2,
            ),
            54 =>
            array (
                'id' => 55,
                'data' => '2016-06-16 12:35:40',
                'id_usuario' => '2',
                'nome' => 'CB1606',
                'sequencia' => '56',
                'id_conta' => 2,
            ),
            55 =>
            array (
                'id' => 56,
                'data' => '2016-06-18 10:18:42',
                'id_usuario' => '2',
                'nome' => 'CB180657.REM',
                'sequencia' => '57',
                'id_conta' => 2,
            ),
            56 =>
            array (
                'id' => 57,
                'data' => '2016-06-20 14:39:20',
                'id_usuario' => '2',
                'nome' => 'CB2006',
                'sequencia' => '58',
                'id_conta' => 2,
            ),
            57 =>
            array (
                'id' => 58,
                'data' => '2016-06-27 15:38:06',
                'id_usuario' => '2',
                'nome' => 'CB270659.REM',
                'sequencia' => '59',
                'id_conta' => 2,
            ),
            58 =>
            array (
                'id' => 59,
                'data' => '2016-06-29 08:53:22',
                'id_usuario' => '2',
                'nome' => 'CB290660.REM',
                'sequencia' => '60',
                'id_conta' => 2,
            ),
            59 =>
            array (
                'id' => 60,
                'data' => '2016-07-01 09:05:40',
                'id_usuario' => '0',
                'nome' => 'CB010761.REM',
                'sequencia' => '61',
                'id_conta' => 2,
            ),
            60 =>
            array (
                'id' => 61,
                'data' => '2016-07-04 11:58:22',
                'id_usuario' => '0',
                'nome' => 'CB040762.REM',
                'sequencia' => '62',
                'id_conta' => 2,
            ),
            61 =>
            array (
                'id' => 62,
                'data' => '2016-07-04 12:47:21',
                'id_usuario' => '2',
                'nome' => 'CB040763.REM',
                'sequencia' => '63',
                'id_conta' => 2,
            ),
            62 =>
            array (
                'id' => 63,
                'data' => '2016-07-06 15:00:24',
                'id_usuario' => '2',
                'nome' => 'CB060764.REM',
                'sequencia' => '64',
                'id_conta' => 2,
            ),
            63 =>
            array (
                'id' => 64,
                'data' => '2016-07-11 08:53:28',
                'id_usuario' => '2',
                'nome' => 'CB110765.REM',
                'sequencia' => '65',
                'id_conta' => 2,
            ),
            64 =>
            array (
                'id' => 65,
                'data' => '2016-07-14 15:51:03',
                'id_usuario' => '0',
                'nome' => 'CB140766.REM',
                'sequencia' => '66',
                'id_conta' => 2,
            ),
            65 =>
            array (
                'id' => 66,
                'data' => '2016-07-15 09:41:53',
                'id_usuario' => '2',
                'nome' => 'CB150767.REM',
                'sequencia' => '67',
                'id_conta' => 2,
            ),
            66 =>
            array (
                'id' => 67,
                'data' => '2016-07-19 13:11:40',
                'id_usuario' => '2',
                'nome' => 'CB190768.REM',
                'sequencia' => '68',
                'id_conta' => 2,
            ),
            67 =>
            array (
                'id' => 68,
                'data' => '2016-07-22 11:44:37',
                'id_usuario' => '2',
                'nome' => 'CB220769.REM',
                'sequencia' => '69',
                'id_conta' => 2,
            ),
            68 =>
            array (
                'id' => 69,
                'data' => '2016-07-26 09:00:07',
                'id_usuario' => '2',
                'nome' => 'CB260770.REM',
                'sequencia' => '70',
                'id_conta' => 2,
            ),
            69 =>
            array (
                'id' => 70,
                'data' => '2016-07-26 15:36:15',
                'id_usuario' => '2',
                'nome' => 'CB260771.REM',
                'sequencia' => '71',
                'id_conta' => 2,
            ),
            70 =>
            array (
                'id' => 71,
                'data' => '2016-08-01 14:55:33',
                'id_usuario' => '2',
                'nome' => 'CB010872.REM',
                'sequencia' => '72',
                'id_conta' => 2,
            ),
            71 =>
            array (
                'id' => 72,
                'data' => '2016-08-03 10:00:43',
                'id_usuario' => '2',
                'nome' => 'CB030873.REM',
                'sequencia' => '73',
                'id_conta' => 2,
            ),
            72 =>
            array (
                'id' => 73,
                'data' => '2016-08-08 08:56:15',
                'id_usuario' => '2',
                'nome' => 'CB0808',
                'sequencia' => '74',
                'id_conta' => 2,
            ),
            73 =>
            array (
                'id' => 74,
                'data' => '2016-08-12 09:20:05',
                'id_usuario' => '2',
                'nome' => 'CB120875.REM',
                'sequencia' => '12',
                'id_conta' => 2,
            ),
            74 =>
            array (
                'id' => 75,
                'data' => '2016-08-12 13:59:57',
                'id_usuario' => '2',
                'nome' => 'CB120876.REM',
                'sequencia' => '76',
                'id_conta' => 2,
            ),
            75 =>
            array (
                'id' => 76,
                'data' => '2016-08-17 09:38:52',
                'id_usuario' => '2',
                'nome' => 'CB170877.REM',
                'sequencia' => '77',
                'id_conta' => 2,
            ),
            76 =>
            array (
                'id' => 77,
                'data' => '2016-08-18 16:03:44',
                'id_usuario' => '2',
                'nome' => 'CB180878.REM',
                'sequencia' => '13',
                'id_conta' => 2,
            ),
            77 =>
            array (
                'id' => 78,
                'data' => '2016-08-22 09:50:52',
                'id_usuario' => '0',
                'nome' => 'CB220879.REM',
                'sequencia' => '79',
                'id_conta' => 2,
            ),
            78 =>
            array (
                'id' => 79,
                'data' => '2016-08-25 08:34:24',
                'id_usuario' => '0',
                'nome' => 'CB250880.REM',
                'sequencia' => '80',
                'id_conta' => 2,
            ),
            79 =>
            array (
                'id' => 80,
                'data' => '2016-08-26 15:02:44',
                'id_usuario' => '2',
                'nome' => 'CB260881.REM',
                'sequencia' => '81',
                'id_conta' => 2,
            ),
            80 =>
            array (
                'id' => 81,
                'data' => '2016-09-01 14:06:36',
                'id_usuario' => '2',
                'nome' => 'CB010982.REM',
                'sequencia' => '82',
                'id_conta' => 2,
            ),
            81 =>
            array (
                'id' => 82,
                'data' => '2016-09-06 14:06:31',
                'id_usuario' => '0',
                'nome' => 'CB060983.REM',
                'sequencia' => '83',
                'id_conta' => 1,
            ),
            82 =>
            array (
                'id' => 83,
                'data' => '2016-09-12 13:20:06',
                'id_usuario' => '2',
                'nome' => 'CB120984.REM',
                'sequencia' => '84',
                'id_conta' => 1,
            ),
            83 =>
            array (
                'id' => 84,
                'data' => '2016-09-14 15:21:02',
                'id_usuario' => '2',
                'nome' => 'CB140985.REM',
                'sequencia' => '85',
                'id_conta' => 1,
            ),
            84 =>
            array (
                'id' => 85,
                'data' => '2016-09-19 10:12:22',
                'id_usuario' => '2',
                'nome' => 'CB190986.REM',
                'sequencia' => '86',
                'id_conta' => 1,
            ),
            85 =>
            array (
                'id' => 86,
                'data' => '2016-09-20 13:51:39',
                'id_usuario' => '2',
                'nome' => 'CB200987.REM',
                'sequencia' => '14',
                'id_conta' => 1,
            ),
            86 =>
            array (
                'id' => 87,
                'data' => '2016-09-23 13:03:18',
                'id_usuario' => '2',
                'nome' => 'CB230988.REM',
                'sequencia' => '88',
                'id_conta' => 1,
            ),
            87 =>
            array (
                'id' => 88,
                'data' => '2016-09-26 16:16:23',
                'id_usuario' => '2',
                'nome' => 'CB260989.REM',
                'sequencia' => '89',
                'id_conta' => 1,
            ),
            88 =>
            array (
                'id' => 89,
                'data' => '2016-09-28 10:10:26',
                'id_usuario' => '0',
                'nome' => 'CB280990.REM',
                'sequencia' => '90',
                'id_conta' => 1,
            ),
            89 =>
            array (
                'id' => 90,
                'data' => '2016-09-30 16:27:32',
                'id_usuario' => '2',
                'nome' => 'CB300991.REM',
                'sequencia' => '91',
                'id_conta' => 1,
            ),
            90 =>
            array (
                'id' => 91,
                'data' => '2016-10-05 15:17:31',
                'id_usuario' => '2',
                'nome' => 'CB051092.REM',
                'sequencia' => '92',
                'id_conta' => 1,
            ),
            91 =>
            array (
                'id' => 92,
                'data' => '2016-10-06 15:39:42',
                'id_usuario' => '2',
                'nome' => 'CB0610',
                'sequencia' => '93',
                'id_conta' => 1,
            ),
            92 =>
            array (
                'id' => 93,
                'data' => '2016-10-17 15:00:33',
                'id_usuario' => '2',
                'nome' => 'CB171094.REM',
                'sequencia' => '94',
                'id_conta' => 1,
            ),
            93 =>
            array (
                'id' => 94,
                'data' => '2016-10-21 11:44:10',
                'id_usuario' => '2',
                'nome' => 'CB211095.REM',
                'sequencia' => '95',
                'id_conta' => 1,
            ),
            94 =>
            array (
                'id' => 95,
                'data' => '2016-10-24 15:49:28',
                'id_usuario' => '2',
                'nome' => 'CB241096.REM',
                'sequencia' => '96',
                'id_conta' => 1,
            ),
            95 =>
            array (
                'id' => 96,
                'data' => '2016-10-26 15:20:50',
                'id_usuario' => '2',
                'nome' => 'CB261097.REM',
                'sequencia' => '97',
                'id_conta' => 1,
            ),
            96 =>
            array (
                'id' => 97,
                'data' => '2016-10-31 14:28:46',
                'id_usuario' => '2',
                'nome' => 'CB311098.REM',
                'sequencia' => '98',
                'id_conta' => 1,
            ),
            97 =>
            array (
                'id' => 98,
                'data' => '2016-11-03 15:53:35',
                'id_usuario' => '2',
                'nome' => 'CB031199.REM',
                'sequencia' => '99',
                'id_conta' => 1,
            ),
            98 =>
            array (
                'id' => 99,
                'data' => '2016-11-07 12:00:45',
                'id_usuario' => '2',
                'nome' => 'CB071101.REM',
                'sequencia' => '1',
                'id_conta' => 1,
            ),
            99 =>
            array (
                'id' => 100,
                'data' => '2016-11-10 11:03:28',
                'id_usuario' => '2',
                'nome' => 'CB101102.REM',
                'sequencia' => '2',
                'id_conta' => 1,
            ),
            100 =>
            array (
                'id' => 101,
                'data' => '2016-11-16 11:21:28',
                'id_usuario' => '2',
                'nome' => 'CB161103.REM',
                'sequencia' => '0',
                'id_conta' => 1,
            ),
            101 =>
            array (
                'id' => 102,
                'data' => '2016-11-18 13:46:31',
                'id_usuario' => '2',
                'nome' => 'CB181104.REM',
                'sequencia' => '4',
                'id_conta' => 1,
            ),
            102 =>
            array (
                'id' => 103,
                'data' => '2016-11-18 19:09:02',
                'id_usuario' => '2',
                'nome' => 'CB181105.REM',
                'sequencia' => '5',
                'id_conta' => 1,
            ),
            103 =>
            array (
                'id' => 104,
                'data' => '2016-11-22 17:59:00',
                'id_usuario' => '0',
                'nome' => 'CB221106.REM',
                'sequencia' => '6',
                'id_conta' => 1,
            ),
            104 =>
            array (
                'id' => 105,
                'data' => '2016-11-28 18:41:43',
                'id_usuario' => '2',
                'nome' => 'CB281107.REM',
                'sequencia' => '7',
                'id_conta' => 1,
            ),
            105 =>
            array (
                'id' => 106,
                'data' => '2016-12-01 14:37:54',
                'id_usuario' => '2',
                'nome' => 'CB011208.REM',
                'sequencia' => '8',
                'id_conta' => 2,
            ),
            106 =>
            array (
                'id' => 107,
                'data' => '2016-12-01 15:35:43',
                'id_usuario' => '0',
                'nome' => 'CB011209.REM',
                'sequencia' => '9',
                'id_conta' => 1,
            ),
            107 =>
            array (
                'id' => 108,
                'data' => '2016-12-09 16:45:14',
                'id_usuario' => '2',
                'nome' => 'CB091210.REM',
                'sequencia' => '10',
                'id_conta' => 1,
            ),
            108 =>
            array (
                'id' => 109,
                'data' => '2016-12-14 14:30:29',
                'id_usuario' => '2',
                'nome' => 'CB141211.REM',
                'sequencia' => '11',
                'id_conta' => 1,
            ),
            109 =>
            array (
                'id' => 110,
                'data' => '2016-12-17 19:12:09',
                'id_usuario' => '0',
                'nome' => 'CB171212.REM',
                'sequencia' => '12',
                'id_conta' => 1,
            ),
            110 =>
            array (
                'id' => 111,
                'data' => '2016-12-27 15:32:56',
                'id_usuario' => '2',
                'nome' => 'CB271213.REM',
                'sequencia' => '13',
                'id_conta' => 1,
            ),
            111 =>
            array (
                'id' => 112,
                'data' => '2016-12-29 14:37:09',
                'id_usuario' => '2',
                'nome' => 'CB291214.REM',
                'sequencia' => '2',
                'id_conta' => 1,
            ),
            112 =>
            array (
                'id' => 113,
                'data' => '2017-01-04 13:52:22',
                'id_usuario' => '2',
                'nome' => 'CB040115.REM',
                'sequencia' => '15',
                'id_conta' => 2,
            ),
            113 =>
            array (
                'id' => 114,
                'data' => '2017-01-06 15:25:51',
                'id_usuario' => '2',
                'nome' => 'CB060116.REM',
                'sequencia' => '16',
                'id_conta' => 1,
            ),
            114 =>
            array (
                'id' => 115,
                'data' => '2017-01-09 15:52:30',
                'id_usuario' => '2',
                'nome' => 'CB090117.REM',
                'sequencia' => '17',
                'id_conta' => 1,
            ),
            115 =>
            array (
                'id' => 116,
                'data' => '2017-01-14 08:01:18',
                'id_usuario' => '2',
                'nome' => 'CB140118.REM',
                'sequencia' => '18',
                'id_conta' => 1,
            ),
            116 =>
            array (
                'id' => 117,
                'data' => '2017-01-17 14:52:57',
                'id_usuario' => '2',
                'nome' => 'CB170119.REM',
                'sequencia' => '19',
                'id_conta' => 1,
            ),
            117 =>
            array (
                'id' => 118,
                'data' => '2017-01-18 17:06:23',
                'id_usuario' => '2',
                'nome' => 'CB180120.REM',
                'sequencia' => '20',
                'id_conta' => 1,
            ),
            118 =>
            array (
                'id' => 119,
                'data' => '2017-01-21 08:50:59',
                'id_usuario' => '2',
                'nome' => 'CB2101',
                'sequencia' => '3',
                'id_conta' => 1,
            ),
            119 =>
            array (
                'id' => 120,
                'data' => '2017-01-24 15:55:57',
                'id_usuario' => '2',
                'nome' => 'CB240122.REM',
                'sequencia' => '22',
                'id_conta' => 1,
            ),
            120 =>
            array (
                'id' => 121,
                'data' => '2017-01-28 10:23:58',
                'id_usuario' => '2',
                'nome' => 'CB2801',
                'sequencia' => '23',
                'id_conta' => 1,
            ),
            121 =>
            array (
                'id' => 122,
                'data' => '2017-02-01 10:55:22',
                'id_usuario' => '2',
                'nome' => 'CB010224.REM',
                'sequencia' => '24',
                'id_conta' => 1,
            ),
            122 =>
            array (
                'id' => 123,
                'data' => '2017-02-06 13:31:14',
                'id_usuario' => '2',
                'nome' => 'CB060225.REM',
                'sequencia' => '25',
                'id_conta' => 2,
            ),
            123 =>
            array (
                'id' => 124,
                'data' => '2017-02-06 13:37:39',
                'id_usuario' => '2',
                'nome' => 'CB060226.REM',
                'sequencia' => '26',
                'id_conta' => 1,
            ),
            124 =>
            array (
                'id' => 125,
                'data' => '2017-02-12 16:16:20',
                'id_usuario' => '2',
                'nome' => 'CB120227.REM',
                'sequencia' => '27',
                'id_conta' => 2,
            ),
            125 =>
            array (
                'id' => 126,
                'data' => '2017-02-13 12:56:59',
                'id_usuario' => '2',
                'nome' => 'CB130228.REM',
                'sequencia' => '28',
                'id_conta' => 2,
            ),
            126 =>
            array (
                'id' => 127,
                'data' => '2017-02-20 16:10:09',
                'id_usuario' => '2',
                'nome' => 'CB200229.REM',
                'sequencia' => '29',
                'id_conta' => 2,
            ),
            127 =>
            array (
                'id' => 128,
                'data' => '2017-02-23 08:19:42',
                'id_usuario' => '2',
                'nome' => 'CB230230.REM',
                'sequencia' => '30',
                'id_conta' => 2,
            ),
            128 =>
            array (
                'id' => 129,
                'data' => '2017-03-01 16:09:18',
                'id_usuario' => '2',
                'nome' => 'CB010331.REM',
                'sequencia' => '5',
                'id_conta' => 2,
            ),
            129 =>
            array (
                'id' => 130,
                'data' => '2017-03-04 12:25:58',
                'id_usuario' => '0',
                'nome' => 'CB040332.REM',
                'sequencia' => '32',
                'id_conta' => 2,
            ),
            130 =>
            array (
                'id' => 131,
                'data' => '2017-03-06 13:17:14',
                'id_usuario' => '2',
                'nome' => 'CB060333.REM',
                'sequencia' => '33',
                'id_conta' => 2,
            ),
            131 =>
            array (
                'id' => 132,
                'data' => '2017-03-10 08:50:46',
                'id_usuario' => '0',
                'nome' => 'CB100334.REM',
                'sequencia' => '34',
                'id_conta' => 2,
            ),
            132 =>
            array (
                'id' => 133,
                'data' => '2017-03-13 13:37:20',
                'id_usuario' => '2',
                'nome' => 'CB130335.REM',
                'sequencia' => '35',
                'id_conta' => 2,
            ),
            133 =>
            array (
                'id' => 134,
                'data' => '2017-03-13 15:31:55',
                'id_usuario' => '2',
                'nome' => 'CB130336.REM',
                'sequencia' => '6',
                'id_conta' => 1,
            ),
            134 =>
            array (
                'id' => 135,
                'data' => '2017-03-20 06:39:06',
                'id_usuario' => '2',
                'nome' => 'CB200337.REM',
                'sequencia' => '37',
                'id_conta' => 2,
            ),
            135 =>
            array (
                'id' => 136,
                'data' => '2017-03-23 13:37:58',
                'id_usuario' => '2',
                'nome' => 'CB2303',
                'sequencia' => '38',
                'id_conta' => 2,
            ),
            136 =>
            array (
                'id' => 137,
                'data' => '2017-03-31 09:51:31',
                'id_usuario' => '2',
                'nome' => 'CB310339.REM',
                'sequencia' => '6',
                'id_conta' => 2,
            ),
            137 =>
            array (
                'id' => 138,
                'data' => '2017-04-04 14:31:07',
                'id_usuario' => '2',
                'nome' => 'CB040440.REM',
                'sequencia' => '40',
                'id_conta' => 2,
            ),
            138 =>
            array (
                'id' => 139,
                'data' => '2017-04-17 13:41:12',
                'id_usuario' => '2',
                'nome' => 'CB170441.REM',
                'sequencia' => '41',
                'id_conta' => 2,
            ),
            139 =>
            array (
                'id' => 140,
                'data' => '2017-04-20 10:46:28',
                'id_usuario' => '2',
                'nome' => 'CB200442.REM',
                'sequencia' => '42',
                'id_conta' => 2,
            ),
            140 =>
            array (
                'id' => 141,
                'data' => '2017-04-26 09:24:40',
                'id_usuario' => '2',
                'nome' => 'CB260443.REM',
                'sequencia' => '43',
                'id_conta' => 2,
            ),
            141 =>
            array (
                'id' => 142,
                'data' => '2017-04-30 11:13:31',
                'id_usuario' => '2',
                'nome' => 'CB300444.REM',
                'sequencia' => '44',
                'id_conta' => 2,
            ),
            142 =>
            array (
                'id' => 143,
                'data' => '2017-05-05 09:05:39',
                'id_usuario' => '2',
                'nome' => 'CB050545.REM',
                'sequencia' => '45',
                'id_conta' => 2,
            ),
            143 =>
            array (
                'id' => 144,
                'data' => '2017-05-09 09:00:50',
                'id_usuario' => '2',
                'nome' => 'CB090546.REM',
                'sequencia' => '46',
                'id_conta' => 2,
            ),
            144 =>
            array (
                'id' => 145,
                'data' => '2017-05-15 10:14:13',
                'id_usuario' => '2',
                'nome' => 'CB150547.REM',
                'sequencia' => '47',
                'id_conta' => 2,
            ),
            145 =>
            array (
                'id' => 146,
                'data' => '2017-05-22 13:32:31',
                'id_usuario' => '0',
                'nome' => 'CB220548.REM',
                'sequencia' => '48',
                'id_conta' => 2,
            ),
            146 =>
            array (
                'id' => 147,
                'data' => '2017-05-24 09:42:00',
                'id_usuario' => '0',
                'nome' => 'CB240549.REM',
                'sequencia' => '49',
                'id_conta' => 2,
            ),
            147 =>
            array (
                'id' => 148,
                'data' => '2017-05-25 15:01:05',
                'id_usuario' => '2',
                'nome' => 'CB250550.REM',
                'sequencia' => '50',
                'id_conta' => 2,
            ),
            148 =>
            array (
                'id' => 149,
                'data' => '2017-05-25 19:04:33',
                'id_usuario' => '2',
                'nome' => 'CB250551.REM',
                'sequencia' => '51',
                'id_conta' => 2,
            ),
            149 =>
            array (
                'id' => 150,
                'data' => '2017-05-29 14:47:09',
                'id_usuario' => '2',
                'nome' => 'CB290552.REM',
                'sequencia' => '52',
                'id_conta' => 2,
            ),
            150 =>
            array (
                'id' => 151,
                'data' => '2017-06-01 16:44:10',
                'id_usuario' => '2',
                'nome' => 'CB010653.REM',
                'sequencia' => '53',
                'id_conta' => 2,
            ),
            151 =>
            array (
                'id' => 152,
                'data' => '2017-06-02 16:25:11',
                'id_usuario' => '2',
                'nome' => 'CB020654.REM',
                'sequencia' => '54',
                'id_conta' => 2,
            ),
            152 =>
            array (
                'id' => 153,
                'data' => '2017-06-06 13:25:49',
                'id_usuario' => '2',
                'nome' => 'CB060655.REM',
                'sequencia' => '55',
                'id_conta' => 2,
            ),
            153 =>
            array (
                'id' => 154,
                'data' => '2017-06-12 13:29:56',
                'id_usuario' => '2',
                'nome' => 'CB120656.REM',
                'sequencia' => '56',
                'id_conta' => 2,
            ),
            154 =>
            array (
                'id' => 155,
                'data' => '2017-06-19 14:02:51',
                'id_usuario' => '2',
                'nome' => 'CB190657.REM',
                'sequencia' => '57',
                'id_conta' => 2,
            ),
            155 =>
            array (
                'id' => 156,
                'data' => '2017-06-21 17:13:50',
                'id_usuario' => '2',
                'nome' => 'CB210658.REM',
                'sequencia' => '58',
                'id_conta' => 2,
            ),
            156 =>
            array (
                'id' => 157,
                'data' => '2017-06-29 13:52:30',
                'id_usuario' => '2',
                'nome' => 'CB290659.REM',
                'sequencia' => '9',
                'id_conta' => 2,
            ),
            157 =>
            array (
                'id' => 158,
                'data' => '2017-07-03 10:29:48',
                'id_usuario' => '2',
                'nome' => 'CB030760.REM',
                'sequencia' => '60',
                'id_conta' => 2,
            ),
            158 =>
            array (
                'id' => 159,
                'data' => '2017-07-04 13:24:15',
                'id_usuario' => '2',
                'nome' => 'CB040761.REM',
                'sequencia' => '61',
                'id_conta' => 2,
            ),
            159 =>
            array (
                'id' => 160,
                'data' => '2017-07-05 21:41:21',
                'id_usuario' => '2',
                'nome' => 'CB050762.REM',
                'sequencia' => '62',
                'id_conta' => 2,
            ),
            160 =>
            array (
                'id' => 161,
                'data' => '2017-07-11 14:05:58',
                'id_usuario' => '2',
                'nome' => 'CB110763.REM',
                'sequencia' => '63',
                'id_conta' => 2,
            ),
            161 =>
            array (
                'id' => 162,
                'data' => '2017-07-17 10:39:44',
                'id_usuario' => '2',
                'nome' => 'CB170764.REM',
                'sequencia' => '64',
                'id_conta' => 2,
            ),
            162 =>
            array (
                'id' => 163,
                'data' => '2017-07-21 18:47:30',
                'id_usuario' => '2',
                'nome' => 'CB210765.REM',
                'sequencia' => '65',
                'id_conta' => 2,
            ),
            163 =>
            array (
                'id' => 164,
                'data' => '2017-07-26 08:43:51',
                'id_usuario' => '2',
                'nome' => 'CB260766.REM',
                'sequencia' => '11',
                'id_conta' => 2,
            ),
            164 =>
            array (
                'id' => 165,
                'data' => '2017-07-28 13:54:44',
                'id_usuario' => '2',
                'nome' => 'CB280767.REM',
                'sequencia' => '67',
                'id_conta' => 2,
            ),
            165 =>
            array (
                'id' => 166,
                'data' => '2017-08-01 13:53:45',
                'id_usuario' => '2',
                'nome' => 'CB010868.REM',
                'sequencia' => '68',
                'id_conta' => 2,
            ),
            166 =>
            array (
                'id' => 167,
                'data' => '2017-08-04 13:21:23',
                'id_usuario' => '2',
                'nome' => 'CB040869.REM',
                'sequencia' => '69',
                'id_conta' => 2,
            ),
            167 =>
            array (
                'id' => 168,
                'data' => '2017-08-04 13:23:05',
                'id_usuario' => '2',
                'nome' => 'CB040870.REM',
                'sequencia' => '70',
                'id_conta' => 1,
            ),
            168 =>
            array (
                'id' => 169,
                'data' => '2017-08-11 18:41:29',
                'id_usuario' => '2',
                'nome' => 'CB110871.REM',
                'sequencia' => '11',
                'id_conta' => 1,
            ),
            169 =>
            array (
                'id' => 170,
                'data' => '2017-08-21 10:22:23',
                'id_usuario' => '2',
                'nome' => 'CB210872.REM',
                'sequencia' => '72',
                'id_conta' => 1,
            ),
            170 =>
            array (
                'id' => 171,
                'data' => '2017-08-23 12:12:02',
                'id_usuario' => '2',
                'nome' => 'CB230873.REM',
                'sequencia' => '73',
                'id_conta' => 1,
            ),
            171 =>
            array (
                'id' => 172,
                'data' => '2017-08-28 13:44:57',
                'id_usuario' => '2',
                'nome' => 'CB280874.REM',
                'sequencia' => '74',
                'id_conta' => 1,
            ),
            172 =>
            array (
                'id' => 173,
                'data' => '2017-08-29 09:47:01',
                'id_usuario' => '2',
                'nome' => 'CB290875.REM',
                'sequencia' => '75',
                'id_conta' => 1,
            ),
            173 =>
            array (
                'id' => 174,
                'data' => '2017-08-29 17:51:13',
                'id_usuario' => '2',
                'nome' => 'CB2908',
                'sequencia' => '76',
                'id_conta' => 1,
            ),
            174 =>
            array (
                'id' => 175,
                'data' => '2017-09-04 13:52:40',
                'id_usuario' => '0',
                'nome' => 'CB040977.REM',
                'sequencia' => '77',
                'id_conta' => 1,
            ),
            175 =>
            array (
                'id' => 176,
                'data' => '2017-09-04 14:19:22',
                'id_usuario' => '2',
                'nome' => 'CB040978.REM',
                'sequencia' => '13',
                'id_conta' => 2,
            ),
            176 =>
            array (
                'id' => 177,
                'data' => '2017-09-11 06:32:40',
                'id_usuario' => '2',
                'nome' => 'CB110979.REM',
                'sequencia' => '13',
                'id_conta' => 1,
            ),
            177 =>
            array (
                'id' => 178,
                'data' => '2017-09-12 11:51:11',
                'id_usuario' => '2',
                'nome' => 'CB120980.REM',
                'sequencia' => '80',
                'id_conta' => 1,
            ),
            178 =>
            array (
                'id' => 179,
                'data' => '2017-09-13 13:36:44',
                'id_usuario' => '2',
                'nome' => 'CB130981.REM',
                'sequencia' => '81',
                'id_conta' => 1,
            ),
            179 =>
            array (
                'id' => 180,
                'data' => '2017-09-18 17:23:16',
                'id_usuario' => '2',
                'nome' => 'CB1809',
                'sequencia' => '82',
                'id_conta' => 1,
            ),
            180 =>
            array (
                'id' => 181,
                'data' => '2017-09-24 10:42:32',
                'id_usuario' => '2',
                'nome' => 'CB240983.REM',
                'sequencia' => '83',
                'id_conta' => 1,
            ),
            181 =>
            array (
                'id' => 182,
                'data' => '2017-09-30 10:55:30',
                'id_usuario' => '2',
                'nome' => 'CB300984.REM',
                'sequencia' => '84',
                'id_conta' => 1,
            ),
            182 =>
            array (
                'id' => 183,
                'data' => '2017-10-03 11:20:46',
                'id_usuario' => '2',
                'nome' => 'CB031085.REM',
                'sequencia' => '85',
                'id_conta' => 2,
            ),
            183 =>
            array (
                'id' => 184,
                'data' => '2017-10-04 14:18:27',
                'id_usuario' => '2',
                'nome' => 'CB041086.REM',
                'sequencia' => '86',
                'id_conta' => 1,
            ),
            184 =>
            array (
                'id' => 185,
                'data' => '2017-10-05 18:18:01',
                'id_usuario' => '2',
                'nome' => 'CB051087.REM',
                'sequencia' => '87',
                'id_conta' => 1,
            ),
            185 =>
            array (
                'id' => 186,
                'data' => '2017-10-16 10:07:42',
                'id_usuario' => '2',
                'nome' => 'CB161088.REM',
                'sequencia' => '88',
                'id_conta' => 1,
            ),
            186 =>
            array (
                'id' => 187,
                'data' => '2017-10-18 20:11:25',
                'id_usuario' => '2',
                'nome' => 'CB181089.REM',
                'sequencia' => '89',
                'id_conta' => 1,
            ),
            187 =>
            array (
                'id' => 188,
                'data' => '2017-10-23 10:26:20',
                'id_usuario' => '2',
                'nome' => 'CB231090.REM',
                'sequencia' => '90',
                'id_conta' => 1,
            ),
            188 =>
            array (
                'id' => 189,
                'data' => '2017-10-23 15:46:35',
                'id_usuario' => '0',
                'nome' => 'CB231091.REM',
                'sequencia' => '91',
                'id_conta' => 1,
            ),
            189 =>
            array (
                'id' => 190,
                'data' => '2017-10-25 09:57:35',
                'id_usuario' => '2',
                'nome' => 'CB251092.REM',
                'sequencia' => '92',
                'id_conta' => 1,
            ),
            190 =>
            array (
                'id' => 191,
                'data' => '2017-10-26 10:57:25',
                'id_usuario' => '2',
                'nome' => 'CB261093.REM',
                'sequencia' => '93',
                'id_conta' => 1,
            ),
            191 =>
            array (
                'id' => 192,
                'data' => '2017-10-30 15:15:48',
                'id_usuario' => '2',
                'nome' => 'CB301094.REM',
                'sequencia' => '94',
                'id_conta' => 1,
            ),
            192 =>
            array (
                'id' => 193,
                'data' => '2017-11-03 11:28:20',
                'id_usuario' => '2',
                'nome' => 'CB031195.REM',
                'sequencia' => '95',
                'id_conta' => 2,
            ),
            193 =>
            array (
                'id' => 194,
                'data' => '2017-11-03 14:01:10',
                'id_usuario' => '2',
                'nome' => 'CB031196.REM',
                'sequencia' => '15',
                'id_conta' => 2,
            ),
            194 =>
            array (
                'id' => 195,
                'data' => '2017-11-09 15:59:20',
                'id_usuario' => '2',
                'nome' => 'CB091197.REM',
                'sequencia' => '97',
                'id_conta' => 2,
            ),
            195 =>
            array (
                'id' => 196,
                'data' => '2017-11-16 15:05:12',
                'id_usuario' => '2',
                'nome' => 'CB161198.REM',
                'sequencia' => '98',
                'id_conta' => 2,
            ),
            196 =>
            array (
                'id' => 197,
                'data' => '2017-11-20 15:40:04',
                'id_usuario' => '2',
                'nome' => 'CB201199.REM',
                'sequencia' => '99',
                'id_conta' => 2,
            ),
            197 =>
            array (
                'id' => 198,
                'data' => '2017-11-22 14:04:42',
                'id_usuario' => '2',
                'nome' => 'CB221101.REM',
                'sequencia' => '1',
                'id_conta' => 2,
            ),
            198 =>
            array (
                'id' => 199,
                'data' => '2017-11-27 14:03:45',
                'id_usuario' => '2',
                'nome' => 'CB271102.REM',
                'sequencia' => '2',
                'id_conta' => 2,
            ),
            199 =>
            array (
                'id' => 200,
                'data' => '2017-11-30 17:48:52',
                'id_usuario' => '2',
                'nome' => 'CB301103.REM',
                'sequencia' => '3',
                'id_conta' => 2,
            ),
            200 =>
            array (
                'id' => 201,
                'data' => '2017-12-05 08:54:47',
                'id_usuario' => '2',
                'nome' => 'CB051204.REM',
                'sequencia' => '4',
                'id_conta' => 2,
            ),
            201 =>
            array (
                'id' => 202,
                'data' => '2017-12-07 09:13:24',
                'id_usuario' => '2',
                'nome' => 'CB071205.REM',
                'sequencia' => '5',
                'id_conta' => 2,
            ),
            202 =>
            array (
                'id' => 203,
                'data' => '2017-12-08 13:32:13',
                'id_usuario' => '2',
                'nome' => 'CB081206.REM',
                'sequencia' => '6',
                'id_conta' => 2,
            ),
            203 =>
            array (
                'id' => 204,
                'data' => '2017-12-12 10:46:08',
                'id_usuario' => '2',
                'nome' => 'CB121207.REM',
                'sequencia' => '7',
                'id_conta' => 2,
            ),
            204 =>
            array (
                'id' => 205,
                'data' => '2017-12-14 11:58:48',
                'id_usuario' => '2',
                'nome' => 'CB141208.REM',
                'sequencia' => '8',
                'id_conta' => 2,
            ),
            205 =>
            array (
                'id' => 206,
                'data' => '2017-12-15 10:23:03',
                'id_usuario' => '2',
                'nome' => 'CB151209.REM',
                'sequencia' => '1',
                'id_conta' => 2,
            ),
            206 =>
            array (
                'id' => 207,
                'data' => '2017-12-18 19:27:35',
                'id_usuario' => '0',
                'nome' => 'CB181210.REM',
                'sequencia' => '10',
                'id_conta' => 2,
            ),
            207 =>
            array (
                'id' => 208,
                'data' => '2017-12-27 13:24:16',
                'id_usuario' => '2',
                'nome' => 'CB271211.REM',
                'sequencia' => '11',
                'id_conta' => 2,
            ),
            208 =>
            array (
                'id' => 209,
                'data' => '2018-01-03 09:59:29',
                'id_usuario' => '2',
                'nome' => 'CB030112.REM',
                'sequencia' => '12',
                'id_conta' => 2,
            ),
            209 =>
            array (
                'id' => 210,
                'data' => '2018-01-05 09:01:05',
                'id_usuario' => '2',
                'nome' => 'CB050113.REM',
                'sequencia' => '13',
                'id_conta' => 2,
            ),
            210 =>
            array (
                'id' => 211,
                'data' => '2018-01-09 17:16:52',
                'id_usuario' => '0',
                'nome' => 'CB090114.REM',
                'sequencia' => '2',
                'id_conta' => 2,
            ),
            211 =>
            array (
                'id' => 212,
                'data' => '2018-01-12 10:36:48',
                'id_usuario' => '2',
                'nome' => 'CB120115.REM',
                'sequencia' => '15',
                'id_conta' => 2,
            ),
            212 =>
            array (
                'id' => 213,
                'data' => '2018-01-15 07:52:55',
                'id_usuario' => '2',
                'nome' => 'CB150116.REM',
                'sequencia' => '16',
                'id_conta' => 2,
            ),
            213 =>
            array (
                'id' => 214,
                'data' => '2018-01-17 15:10:11',
                'id_usuario' => '2',
                'nome' => 'CB1701',
                'sequencia' => '17',
                'id_conta' => 2,
            ),
            214 =>
            array (
                'id' => 215,
                'data' => '2018-01-22 08:02:25',
                'id_usuario' => '2',
                'nome' => 'CB220118.REM',
                'sequencia' => '18',
                'id_conta' => 2,
            ),
            215 =>
            array (
                'id' => 216,
                'data' => '2018-01-23 08:39:18',
                'id_usuario' => '2',
                'nome' => 'CB230119.REM',
                'sequencia' => '19',
                'id_conta' => 2,
            ),
            216 =>
            array (
                'id' => 217,
                'data' => '2018-01-25 14:15:27',
                'id_usuario' => '2',
                'nome' => 'CB250120.REM',
                'sequencia' => '20',
                'id_conta' => 2,
            ),
            217 =>
            array (
                'id' => 218,
                'data' => '2018-01-30 11:22:31',
                'id_usuario' => '2',
                'nome' => 'CB300121.REM',
                'sequencia' => '21',
                'id_conta' => 2,
            ),
            218 =>
            array (
                'id' => 219,
                'data' => '2018-02-01 14:50:23',
                'id_usuario' => '2',
                'nome' => 'CB010222.REM',
                'sequencia' => '4',
                'id_conta' => 2,
            ),
            219 =>
            array (
                'id' => 220,
                'data' => '2018-02-05 08:58:33',
                'id_usuario' => '2',
                'nome' => 'CB050223.REM',
                'sequencia' => '23',
                'id_conta' => 2,
            ),
            220 =>
            array (
                'id' => 221,
                'data' => '2018-02-05 17:21:59',
                'id_usuario' => '2',
                'nome' => 'CB050224.REM',
                'sequencia' => '24',
                'id_conta' => 2,
            ),
            221 =>
            array (
                'id' => 222,
                'data' => '2018-02-09 13:04:06',
                'id_usuario' => '2',
                'nome' => 'CB090225.REM',
                'sequencia' => '25',
                'id_conta' => 2,
            ),
            222 =>
            array (
                'id' => 223,
                'data' => '2018-02-14 12:57:19',
                'id_usuario' => '2',
                'nome' => 'CB140226.REM',
                'sequencia' => '26',
                'id_conta' => 2,
            ),
            223 =>
            array (
                'id' => 224,
                'data' => '2018-02-18 12:12:10',
                'id_usuario' => '2',
                'nome' => 'CB180227.REM',
                'sequencia' => '27',
                'id_conta' => 2,
            ),
            224 =>
            array (
                'id' => 225,
                'data' => '2018-02-19 14:14:34',
                'id_usuario' => '2',
                'nome' => 'CB190228.REM',
                'sequencia' => '28',
                'id_conta' => 2,
            ),
            225 =>
            array (
                'id' => 226,
                'data' => '2018-02-23 10:02:14',
                'id_usuario' => '2',
                'nome' => 'CB230229.REM',
                'sequencia' => '29',
                'id_conta' => 1,
            ),
            226 =>
            array (
                'id' => 227,
                'data' => '2018-02-27 12:02:30',
                'id_usuario' => '2',
                'nome' => 'CB270230.REM',
                'sequencia' => '5',
                'id_conta' => 1,
            ),
            227 =>
            array (
                'id' => 228,
                'data' => '2018-03-03 10:30:40',
                'id_usuario' => '0',
                'nome' => 'CB0303',
                'sequencia' => '31',
                'id_conta' => 2,
            ),
            228 =>
            array (
                'id' => 229,
                'data' => '2018-03-07 08:47:09',
                'id_usuario' => '2',
                'nome' => 'CB070332.REM',
                'sequencia' => '32',
                'id_conta' => 1,
            ),
            229 =>
            array (
                'id' => 230,
                'data' => '2018-03-09 13:48:54',
                'id_usuario' => '2',
                'nome' => 'CB090333.REM',
                'sequencia' => '33',
                'id_conta' => 1,
            ),
            230 =>
            array (
                'id' => 231,
                'data' => '2018-03-12 15:42:44',
                'id_usuario' => '2',
                'nome' => 'CB1203',
                'sequencia' => '34',
                'id_conta' => 1,
            ),
            231 =>
            array (
                'id' => 232,
                'data' => '2018-03-14 13:12:01',
                'id_usuario' => '2',
                'nome' => 'CB140335.REM',
                'sequencia' => '35',
                'id_conta' => 1,
            ),
            232 =>
            array (
                'id' => 233,
                'data' => '2018-03-19 15:47:05',
                'id_usuario' => '2',
                'nome' => 'CB190336.REM',
                'sequencia' => '36',
                'id_conta' => 1,
            ),
            233 =>
            array (
                'id' => 234,
                'data' => '2018-03-21 15:17:56',
                'id_usuario' => '2',
                'nome' => 'CB2103',
                'sequencia' => '37',
                'id_conta' => 1,
            ),
            234 =>
            array (
                'id' => 235,
                'data' => '2018-03-26 15:16:04',
                'id_usuario' => '2',
                'nome' => 'CB2603',
                'sequencia' => '38',
                'id_conta' => 1,
            ),
            235 =>
            array (
                'id' => 236,
                'data' => '2018-03-31 18:19:21',
                'id_usuario' => '2',
                'nome' => 'CB310339.REM',
                'sequencia' => '39',
                'id_conta' => 1,
            ),
            236 =>
            array (
                'id' => 237,
                'data' => '2018-04-04 08:00:57',
                'id_usuario' => '2',
                'nome' => 'CB040440.REM',
                'sequencia' => '6',
                'id_conta' => 2,
            ),
            237 =>
            array (
                'id' => 238,
                'data' => '2018-04-11 16:42:04',
                'id_usuario' => '2',
                'nome' => 'CB110441.REM',
                'sequencia' => '41',
                'id_conta' => 1,
            ),
            238 =>
            array (
                'id' => 239,
                'data' => '2018-04-16 09:21:51',
                'id_usuario' => '2',
                'nome' => 'CB160442.REM',
                'sequencia' => '7',
                'id_conta' => 1,
            ),
            239 =>
            array (
                'id' => 240,
                'data' => '2018-04-19 15:06:22',
                'id_usuario' => '0',
                'nome' => 'CB190443.REM',
                'sequencia' => '43',
                'id_conta' => 1,
            ),
            240 =>
            array (
                'id' => 241,
                'data' => '2018-04-22 10:37:49',
                'id_usuario' => '2',
                'nome' => 'CB2204',
                'sequencia' => '44',
                'id_conta' => 1,
            ),
            241 =>
            array (
                'id' => 242,
                'data' => '2018-04-24 16:46:10',
                'id_usuario' => '2',
                'nome' => 'CB240445.REM',
                'sequencia' => '45',
                'id_conta' => 1,
            ),
            242 =>
            array (
                'id' => 243,
                'data' => '2018-04-25 15:42:32',
                'id_usuario' => '2',
                'nome' => 'CB250446.REM',
                'sequencia' => '46',
                'id_conta' => 1,
            ),
            243 =>
            array (
                'id' => 244,
                'data' => '2018-04-25 19:15:02',
                'id_usuario' => '2',
                'nome' => 'CB250447.REM',
                'sequencia' => '47',
                'id_conta' => 1,
            ),
            244 =>
            array (
                'id' => 245,
                'data' => '2018-05-05 09:31:00',
                'id_usuario' => '2',
                'nome' => 'CB050548.REM',
                'sequencia' => '48',
                'id_conta' => 2,
            ),
            245 =>
            array (
                'id' => 246,
                'data' => '2018-05-07 08:48:46',
                'id_usuario' => '2',
                'nome' => 'CB0705',
                'sequencia' => '49',
                'id_conta' => 2,
            ),
            246 =>
            array (
                'id' => 247,
                'data' => '2018-05-10 09:23:19',
                'id_usuario' => '2',
                'nome' => 'CB100550.REM',
                'sequencia' => '50',
                'id_conta' => 2,
            ),
            247 =>
            array (
                'id' => 248,
                'data' => '2018-05-14 08:49:04',
                'id_usuario' => '2',
                'nome' => 'CB140551.REM',
                'sequencia' => '8',
                'id_conta' => 2,
            ),
            248 =>
            array (
                'id' => 249,
                'data' => '2018-05-15 14:38:52',
                'id_usuario' => '2',
                'nome' => 'CB150552.REM',
                'sequencia' => '52',
                'id_conta' => 2,
            ),
            249 =>
            array (
                'id' => 250,
                'data' => '2018-05-18 08:50:14',
                'id_usuario' => '2',
                'nome' => 'CB180553.REM',
                'sequencia' => '53',
                'id_conta' => 2,
            ),
            250 =>
            array (
                'id' => 251,
                'data' => '2018-05-18 17:53:15',
                'id_usuario' => '2',
                'nome' => 'CB180554.REM',
                'sequencia' => '9',
                'id_conta' => 2,
            ),
            251 =>
            array (
                'id' => 252,
                'data' => '2018-05-22 11:22:25',
                'id_usuario' => '2',
                'nome' => 'CB220555.REM',
                'sequencia' => '55',
                'id_conta' => 2,
            ),
            252 =>
            array (
                'id' => 253,
                'data' => '2018-05-24 12:15:26',
                'id_usuario' => '2',
                'nome' => 'CB240556.REM',
                'sequencia' => '56',
                'id_conta' => 2,
            ),
            253 =>
            array (
                'id' => 254,
                'data' => '2018-05-28 18:46:18',
                'id_usuario' => '2',
                'nome' => 'CB280557.REM',
                'sequencia' => '57',
                'id_conta' => 2,
            ),
            254 =>
            array (
                'id' => 255,
                'data' => '2018-05-31 09:50:41',
                'id_usuario' => '2',
                'nome' => 'CB310558.REM',
                'sequencia' => '58',
                'id_conta' => 2,
            ),
            255 =>
            array (
                'id' => 256,
                'data' => '2018-06-01 13:38:59',
                'id_usuario' => '2',
                'nome' => 'CB010659.REM',
                'sequencia' => '59',
                'id_conta' => 2,
            ),
            256 =>
            array (
                'id' => 257,
                'data' => '2018-06-05 16:29:47',
                'id_usuario' => '2',
                'nome' => 'CB050660.REM',
                'sequencia' => '60',
                'id_conta' => 2,
            ),
            257 =>
            array (
                'id' => 258,
                'data' => '2018-06-11 15:22:35',
                'id_usuario' => '2',
                'nome' => 'CB110661.REM',
                'sequencia' => '61',
                'id_conta' => 2,
            ),
            258 =>
            array (
                'id' => 259,
                'data' => '2018-06-12 14:40:14',
                'id_usuario' => '2',
                'nome' => 'CB120662.REM',
                'sequencia' => '10',
                'id_conta' => 2,
            ),
            259 =>
            array (
                'id' => 260,
                'data' => '2018-06-14 14:36:39',
                'id_usuario' => '2',
                'nome' => 'CB140663.REM',
                'sequencia' => '10',
                'id_conta' => 2,
            ),
            260 =>
            array (
                'id' => 261,
                'data' => '2018-06-18 10:19:45',
                'id_usuario' => '2',
                'nome' => 'CB180664.REM',
                'sequencia' => '64',
                'id_conta' => 2,
            ),
            261 =>
            array (
                'id' => 262,
                'data' => '2018-06-18 16:17:59',
                'id_usuario' => '2',
                'nome' => 'CB180665.REM',
                'sequencia' => '65',
                'id_conta' => 2,
            ),
            262 =>
            array (
                'id' => 263,
                'data' => '2018-06-20 12:17:08',
                'id_usuario' => '2',
                'nome' => 'CB200666.REM',
                'sequencia' => '66',
                'id_conta' => 2,
            ),
            263 =>
            array (
                'id' => 264,
                'data' => '2018-06-23 09:29:09',
                'id_usuario' => '2',
                'nome' => 'CB230667.REM',
                'sequencia' => '67',
                'id_conta' => 2,
            ),
            264 =>
            array (
                'id' => 265,
                'data' => '2018-06-27 17:00:14',
                'id_usuario' => '2',
                'nome' => 'CB270668.REM',
                'sequencia' => '11',
                'id_conta' => 2,
            ),
            265 =>
            array (
                'id' => 266,
                'data' => '2018-06-28 10:17:28',
                'id_usuario' => '2',
                'nome' => 'CB280669.REM',
                'sequencia' => '69',
                'id_conta' => 2,
            ),
            266 =>
            array (
                'id' => 267,
                'data' => '2018-07-02 09:48:17',
                'id_usuario' => '0',
                'nome' => 'CB020770.REM',
                'sequencia' => '70',
                'id_conta' => 2,
            ),
            267 =>
            array (
                'id' => 268,
                'data' => '2018-07-03 17:18:50',
                'id_usuario' => '2',
                'nome' => 'CB030771.REM',
                'sequencia' => '71',
                'id_conta' => 2,
            ),
            268 =>
            array (
                'id' => 269,
                'data' => '2018-07-06 10:59:30',
                'id_usuario' => '2',
                'nome' => 'CB060772.REM',
                'sequencia' => '72',
                'id_conta' => 2,
            ),
            269 =>
            array (
                'id' => 270,
                'data' => '2018-07-10 16:12:27',
                'id_usuario' => '0',
                'nome' => 'CB100773.REM',
                'sequencia' => '12',
                'id_conta' => 2,
            ),
            270 =>
            array (
                'id' => 271,
                'data' => '2018-07-17 14:19:54',
                'id_usuario' => '2',
                'nome' => 'CB170774.REM',
                'sequencia' => '74',
                'id_conta' => 2,
            ),
            271 =>
            array (
                'id' => 272,
                'data' => '2018-07-19 17:44:50',
                'id_usuario' => '2',
                'nome' => 'CB190775.REM',
                'sequencia' => '75',
                'id_conta' => 2,
            ),
            272 =>
            array (
                'id' => 273,
                'data' => '2018-07-23 15:06:42',
                'id_usuario' => '2',
                'nome' => 'CB230776.REM',
                'sequencia' => '76',
                'id_conta' => 2,
            ),
            273 =>
            array (
                'id' => 274,
                'data' => '2018-07-24 14:50:18',
                'id_usuario' => '2',
                'nome' => 'CB240777.REM',
                'sequencia' => '77',
                'id_conta' => 2,
            ),
            274 =>
            array (
                'id' => 275,
                'data' => '2018-07-25 13:45:10',
                'id_usuario' => '2',
                'nome' => 'CB250778.REM',
                'sequencia' => '13',
                'id_conta' => 2,
            ),
            275 =>
            array (
                'id' => 276,
                'data' => '2018-07-27 10:25:49',
                'id_usuario' => '0',
                'nome' => 'CB270779.REM',
                'sequencia' => '13',
                'id_conta' => 2,
            ),
            276 =>
            array (
                'id' => 277,
                'data' => '2018-07-31 17:50:33',
                'id_usuario' => '2',
                'nome' => 'CB310780.REM',
                'sequencia' => '80',
                'id_conta' => 1,
            ),
            277 =>
            array (
                'id' => 278,
                'data' => '2018-08-01 19:50:16',
                'id_usuario' => '2',
                'nome' => 'CB010881.REM',
                'sequencia' => '81',
                'id_conta' => 2,
            ),
            278 =>
            array (
                'id' => 279,
                'data' => '2018-08-03 11:08:54',
                'id_usuario' => '2',
                'nome' => 'CB030882.REM',
                'sequencia' => '82',
                'id_conta' => 1,
            ),
            279 =>
            array (
                'id' => 280,
                'data' => '2018-08-04 11:10:32',
                'id_usuario' => '2',
                'nome' => 'CB040883.REM',
                'sequencia' => '83',
                'id_conta' => 2,
            ),
            280 =>
            array (
                'id' => 281,
                'data' => '2018-08-07 15:50:58',
                'id_usuario' => '0',
                'nome' => 'CB070884.REM',
                'sequencia' => '84',
                'id_conta' => 2,
            ),
            281 =>
            array (
                'id' => 282,
                'data' => '2018-08-09 10:24:51',
                'id_usuario' => '2',
                'nome' => 'CB090885.REM',
                'sequencia' => '85',
                'id_conta' => 2,
            ),
            282 =>
            array (
                'id' => 283,
                'data' => '2018-08-10 14:09:07',
                'id_usuario' => '2',
                'nome' => 'CB100886.REM',
                'sequencia' => '86',
                'id_conta' => 2,
            ),
            283 =>
            array (
                'id' => 284,
                'data' => '2018-08-13 08:39:59',
                'id_usuario' => '2',
                'nome' => 'CB130887.REM',
                'sequencia' => '87',
                'id_conta' => 2,
            ),
            284 =>
            array (
                'id' => 285,
                'data' => '2018-08-14 15:31:51',
                'id_usuario' => '2',
                'nome' => 'CB1408',
                'sequencia' => '88',
                'id_conta' => 2,
            ),
            285 =>
            array (
                'id' => 286,
                'data' => '2018-08-16 15:58:30',
                'id_usuario' => '2',
                'nome' => 'CB160889.REM',
                'sequencia' => '89',
                'id_conta' => 2,
            ),
            286 =>
            array (
                'id' => 287,
                'data' => '2018-08-17 16:23:51',
                'id_usuario' => '2',
                'nome' => 'CB1708',
                'sequencia' => '90',
                'id_conta' => 2,
            ),
            287 =>
            array (
                'id' => 288,
                'data' => '2018-08-20 12:07:42',
                'id_usuario' => '2',
                'nome' => 'CB200891.REM',
                'sequencia' => '91',
                'id_conta' => 2,
            ),
            288 =>
            array (
                'id' => 289,
                'data' => '2018-08-22 18:27:08',
                'id_usuario' => '0',
                'nome' => 'CB220892.REM',
                'sequencia' => '92',
                'id_conta' => 2,
            ),
            289 =>
            array (
                'id' => 290,
                'data' => '2018-08-24 09:54:11',
                'id_usuario' => '2',
                'nome' => 'CB240893.REM',
                'sequencia' => '93',
                'id_conta' => 2,
            ),
            290 =>
            array (
                'id' => 291,
                'data' => '2018-08-27 10:49:51',
                'id_usuario' => '2',
                'nome' => 'CB270894.REM',
                'sequencia' => '94',
                'id_conta' => 2,
            ),
            291 =>
            array (
                'id' => 292,
                'data' => '2018-08-28 16:29:44',
                'id_usuario' => '2',
                'nome' => 'CB280895.REM',
                'sequencia' => '95',
                'id_conta' => 2,
            ),
            292 =>
            array (
                'id' => 293,
                'data' => '2018-08-29 16:05:30',
                'id_usuario' => '2',
                'nome' => 'CB290896.REM',
                'sequencia' => '96',
                'id_conta' => 2,
            ),
            293 =>
            array (
                'id' => 294,
                'data' => '2018-09-01 20:11:04',
                'id_usuario' => '2',
                'nome' => 'CB010997.REM',
                'sequencia' => '97',
                'id_conta' => 2,
            ),
            294 =>
            array (
                'id' => 295,
                'data' => '2018-09-04 10:09:40',
                'id_usuario' => '2',
                'nome' => 'CB040998.REM',
                'sequencia' => '98',
                'id_conta' => 2,
            ),
            295 =>
            array (
                'id' => 296,
                'data' => '2018-09-06 08:57:04',
                'id_usuario' => '2',
                'nome' => 'CB060999.REM',
                'sequencia' => '99',
                'id_conta' => 2,
            ),
            296 =>
            array (
                'id' => 297,
                'data' => '2018-09-11 11:00:03',
                'id_usuario' => '2',
                'nome' => 'CB110901.REM',
                'sequencia' => '1',
                'id_conta' => 2,
            ),
            297 =>
            array (
                'id' => 298,
                'data' => '2018-09-17 08:50:48',
                'id_usuario' => '2',
                'nome' => 'CB1709',
                'sequencia' => '2',
                'id_conta' => 2,
            ),
            298 =>
            array (
                'id' => 299,
                'data' => '2018-09-19 15:05:20',
                'id_usuario' => '2',
                'nome' => 'CB190903.REM',
                'sequencia' => '3',
                'id_conta' => 2,
            ),
            299 =>
            array (
                'id' => 300,
                'data' => '2018-09-20 11:05:04',
                'id_usuario' => '2',
                'nome' => 'CB200904.REM',
                'sequencia' => '4',
                'id_conta' => 2,
            ),
            300 =>
            array (
                'id' => 301,
                'data' => '2018-09-24 12:12:31',
                'id_usuario' => '2',
                'nome' => 'CB240905.REM',
                'sequencia' => '5',
                'id_conta' => 2,
            ),
            301 =>
            array (
                'id' => 302,
                'data' => '2018-09-25 19:17:11',
                'id_usuario' => '2',
                'nome' => 'CB250906.REM',
                'sequencia' => '6',
                'id_conta' => 2,
            ),
            302 =>
            array (
                'id' => 303,
                'data' => '2018-09-28 10:52:56',
                'id_usuario' => '2',
                'nome' => 'CB280907.REM',
                'sequencia' => '7',
                'id_conta' => 2,
            ),
            303 =>
            array (
                'id' => 304,
                'data' => '2018-10-01 09:54:21',
                'id_usuario' => '2',
                'nome' => 'CB011008.REM',
                'sequencia' => '8',
                'id_conta' => 2,
            ),
            304 =>
            array (
                'id' => 305,
                'data' => '2018-10-02 08:54:33',
                'id_usuario' => '2',
                'nome' => 'CB0210',
                'sequencia' => '9',
                'id_conta' => 2,
            ),
            305 =>
            array (
                'id' => 306,
                'data' => '2018-10-05 16:18:50',
                'id_usuario' => '2',
                'nome' => 'CB051010.REM',
                'sequencia' => '10',
                'id_conta' => 2,
            ),
            306 =>
            array (
                'id' => 307,
                'data' => '2018-10-09 13:56:37',
                'id_usuario' => '2',
                'nome' => 'CB091011.REM',
                'sequencia' => '11',
                'id_conta' => 1,
            ),
            307 =>
            array (
                'id' => 308,
                'data' => '2018-10-15 10:23:24',
                'id_usuario' => '2',
                'nome' => 'CB151012.REM',
                'sequencia' => '12',
                'id_conta' => 1,
            ),
            308 =>
            array (
                'id' => 309,
                'data' => '2018-10-16 10:51:11',
                'id_usuario' => '2',
                'nome' => 'CB161013.REM',
                'sequencia' => '13',
                'id_conta' => 1,
            ),
            309 =>
            array (
                'id' => 310,
                'data' => '2018-10-18 09:06:52',
                'id_usuario' => '2',
                'nome' => 'CB181014.REM',
                'sequencia' => '14',
                'id_conta' => 1,
            ),
            310 =>
            array (
                'id' => 311,
                'data' => '2018-10-19 12:00:41',
                'id_usuario' => '2',
                'nome' => 'CB1910',
                'sequencia' => '15',
                'id_conta' => 1,
            ),
            311 =>
            array (
                'id' => 312,
                'data' => '2018-10-31 14:56:19',
                'id_usuario' => '2',
                'nome' => 'CB311016.REM',
                'sequencia' => '16',
                'id_conta' => 1,
            ),
            312 =>
            array (
                'id' => 313,
                'data' => '2018-11-05 09:01:06',
                'id_usuario' => '2',
                'nome' => 'CB051117.REM',
                'sequencia' => '17',
                'id_conta' => 2,
            ),
            313 =>
            array (
                'id' => 314,
                'data' => '2018-11-05 16:36:29',
                'id_usuario' => '2',
                'nome' => 'CB051118.REM',
                'sequencia' => '18',
                'id_conta' => 1,
            ),
            314 =>
            array (
                'id' => 315,
                'data' => '2018-11-08 08:58:01',
                'id_usuario' => '0',
                'nome' => 'CB081119.REM',
                'sequencia' => '19',
                'id_conta' => 1,
            ),
            315 =>
            array (
                'id' => 316,
                'data' => '2018-11-12 16:24:56',
                'id_usuario' => '0',
                'nome' => 'CB121120.REM',
                'sequencia' => '20',
                'id_conta' => 1,
            ),
            316 =>
            array (
                'id' => 317,
                'data' => '2018-11-13 14:13:47',
                'id_usuario' => '2',
                'nome' => 'CB131121.REM',
                'sequencia' => '21',
                'id_conta' => 1,
            ),
            317 =>
            array (
                'id' => 318,
                'data' => '2018-11-16 09:51:50',
                'id_usuario' => '2',
                'nome' => 'CB161122.REM',
                'sequencia' => '22',
                'id_conta' => 1,
            ),
            318 =>
            array (
                'id' => 319,
                'data' => '2018-11-20 06:29:33',
                'id_usuario' => '2',
                'nome' => 'CB201123.REM',
                'sequencia' => '23',
                'id_conta' => 1,
            ),
            319 =>
            array (
                'id' => 320,
                'data' => '2018-11-22 12:43:24',
                'id_usuario' => '2',
                'nome' => 'CB2211',
                'sequencia' => '24',
                'id_conta' => 1,
            ),
            320 =>
            array (
                'id' => 321,
                'data' => '2018-11-26 10:05:40',
                'id_usuario' => '0',
                'nome' => 'CB261125.REM',
                'sequencia' => '25',
                'id_conta' => 1,
            ),
            321 =>
            array (
                'id' => 322,
                'data' => '2018-11-30 09:15:33',
                'id_usuario' => '2',
                'nome' => 'CB301126.REM',
                'sequencia' => '26',
                'id_conta' => 1,
            ),
            322 =>
            array (
                'id' => 323,
                'data' => '2018-12-03 16:13:16',
                'id_usuario' => '2',
                'nome' => 'CB031227.REM',
                'sequencia' => '27',
                'id_conta' => 2,
            ),
            323 =>
            array (
                'id' => 324,
                'data' => '2018-12-05 11:54:52',
                'id_usuario' => '0',
                'nome' => 'CB051228.REM',
                'sequencia' => '28',
                'id_conta' => 1,
            ),
            324 =>
            array (
                'id' => 325,
                'data' => '2018-12-06 12:03:10',
                'id_usuario' => '2',
                'nome' => 'CB061229.REM',
                'sequencia' => '29',
                'id_conta' => 1,
            ),
            325 =>
            array (
                'id' => 326,
                'data' => '2018-12-11 09:37:11',
                'id_usuario' => '2',
                'nome' => 'CB111230.REM',
                'sequencia' => '30',
                'id_conta' => 1,
            ),
            326 =>
            array (
                'id' => 327,
                'data' => '2018-12-12 15:15:17',
                'id_usuario' => '2',
                'nome' => 'CB121231.REM',
                'sequencia' => '31',
                'id_conta' => 1,
            ),
            327 =>
            array (
                'id' => 328,
                'data' => '2018-12-17 09:54:38',
                'id_usuario' => '2',
                'nome' => 'CB1712',
                'sequencia' => '32',
                'id_conta' => 1,
            ),
            328 =>
            array (
                'id' => 329,
                'data' => '2018-12-18 16:42:36',
                'id_usuario' => '0',
                'nome' => 'CB181233.REM',
                'sequencia' => '33',
                'id_conta' => 1,
            ),
            329 =>
            array (
                'id' => 330,
                'data' => '2018-12-28 16:17:41',
                'id_usuario' => '0',
                'nome' => 'CB281234.REM',
                'sequencia' => '34',
                'id_conta' => 1,
            ),
            330 =>
            array (
                'id' => 331,
                'data' => '2018-12-28 16:58:01',
                'id_usuario' => '2',
                'nome' => 'CB281235.REM',
                'sequencia' => '35',
                'id_conta' => 2,
            ),
            331 =>
            array (
                'id' => 332,
                'data' => '2019-01-04 14:37:27',
                'id_usuario' => '2',
                'nome' => 'CB040136.REM',
                'sequencia' => '36',
                'id_conta' => 2,
            ),
            332 =>
            array (
                'id' => 333,
                'data' => '2019-01-11 17:33:11',
                'id_usuario' => '2',
                'nome' => 'CB110137.REM',
                'sequencia' => '37',
                'id_conta' => 2,
            ),
            333 =>
            array (
                'id' => 334,
                'data' => '2019-01-15 15:39:19',
                'id_usuario' => '2',
                'nome' => 'CB150138.REM',
                'sequencia' => '38',
                'id_conta' => 2,
            ),
            334 =>
            array (
                'id' => 335,
                'data' => '2019-01-17 15:49:04',
                'id_usuario' => '2',
                'nome' => 'CB170139.REM',
                'sequencia' => '6',
                'id_conta' => 2,
            ),
            335 =>
            array (
                'id' => 336,
                'data' => '2019-01-21 08:59:08',
                'id_usuario' => '2',
                'nome' => 'CB2101',
                'sequencia' => '40',
                'id_conta' => 2,
            ),
            336 =>
            array (
                'id' => 337,
                'data' => '2019-01-22 14:48:46',
                'id_usuario' => '2',
                'nome' => 'CB220141.REM',
                'sequencia' => '41',
                'id_conta' => 2,
            ),
            337 =>
            array (
                'id' => 338,
                'data' => '2019-01-24 09:11:52',
                'id_usuario' => '2',
                'nome' => 'CB240142.REM',
                'sequencia' => '42',
                'id_conta' => 2,
            ),
            338 =>
            array (
                'id' => 339,
                'data' => '2019-01-28 06:39:16',
                'id_usuario' => '2',
                'nome' => 'CB280143.REM',
                'sequencia' => '43',
                'id_conta' => 2,
            ),
            339 =>
            array (
                'id' => 340,
                'data' => '2019-01-31 14:14:22',
                'id_usuario' => '2',
                'nome' => 'CB310144.REM',
                'sequencia' => '44',
                'id_conta' => 2,
            ),
            340 =>
            array (
                'id' => 341,
                'data' => '2019-02-01 10:32:20',
                'id_usuario' => '2',
                'nome' => 'CB010245.REM',
                'sequencia' => '45',
                'id_conta' => 2,
            ),
            341 =>
            array (
                'id' => 342,
                'data' => '2019-02-05 08:31:55',
                'id_usuario' => '2',
                'nome' => 'CB050246.REM',
                'sequencia' => '46',
                'id_conta' => 2,
            ),
            342 =>
            array (
                'id' => 343,
                'data' => '2019-02-07 09:41:40',
                'id_usuario' => '2',
                'nome' => 'CB070247.REM',
                'sequencia' => '47',
                'id_conta' => 2,
            ),
            343 =>
            array (
                'id' => 344,
                'data' => '2019-02-11 11:15:46',
                'id_usuario' => '2',
                'nome' => 'CB110248.REM',
                'sequencia' => '48',
                'id_conta' => 2,
            ),
            344 =>
            array (
                'id' => 345,
                'data' => '2019-02-19 18:39:40',
                'id_usuario' => '2',
                'nome' => 'CB190249.REM',
                'sequencia' => '49',
                'id_conta' => 2,
            ),
            345 =>
            array (
                'id' => 346,
                'data' => '2019-02-20 18:34:12',
                'id_usuario' => '2',
                'nome' => 'CB200250.REM',
                'sequencia' => '50',
                'id_conta' => 2,
            ),
            346 =>
            array (
                'id' => 347,
                'data' => '2019-02-22 09:47:08',
                'id_usuario' => '2',
                'nome' => 'CB220251.REM',
                'sequencia' => '8',
                'id_conta' => 2,
            ),
            347 =>
            array (
                'id' => 348,
                'data' => '2019-02-25 18:29:21',
                'id_usuario' => '2',
                'nome' => 'CB250252.REM',
                'sequencia' => '52',
                'id_conta' => 1,
            ),
            348 =>
            array (
                'id' => 349,
                'data' => '2019-02-27 15:51:36',
                'id_usuario' => '2',
                'nome' => 'CB270253.REM',
                'sequencia' => '53',
                'id_conta' => 1,
            ),
            349 =>
            array (
                'id' => 350,
                'data' => '2019-03-01 18:07:10',
                'id_usuario' => '2',
                'nome' => 'CB010354.REM',
                'sequencia' => '54',
                'id_conta' => 2,
            ),
            350 =>
            array (
                'id' => 351,
                'data' => '2019-03-07 15:10:27',
                'id_usuario' => '2',
                'nome' => 'CB070355.REM',
                'sequencia' => '55',
                'id_conta' => 2,
            ),
            351 =>
            array (
                'id' => 352,
                'data' => '2019-03-11 12:33:51',
                'id_usuario' => '2',
                'nome' => 'CB110356.REM',
                'sequencia' => '56',
                'id_conta' => 2,
            ),
            352 =>
            array (
                'id' => 353,
                'data' => '2019-03-14 16:33:21',
                'id_usuario' => '0',
                'nome' => 'CB140357.REM',
                'sequencia' => '57',
                'id_conta' => 2,
            ),
            353 =>
            array (
                'id' => 354,
                'data' => '2019-03-15 15:04:51',
                'id_usuario' => '0',
                'nome' => 'CB150358.REM',
                'sequencia' => '58',
                'id_conta' => 1,
            ),
            354 =>
            array (
                'id' => 355,
                'data' => '2019-03-18 14:07:07',
                'id_usuario' => '2',
                'nome' => 'CB180359.REM',
                'sequencia' => '9',
                'id_conta' => 1,
            ),
            355 =>
            array (
                'id' => 356,
                'data' => '2019-03-19 15:20:58',
                'id_usuario' => '2',
                'nome' => 'CB190360.REM',
                'sequencia' => '60',
                'id_conta' => 1,
            ),
            356 =>
            array (
                'id' => 357,
                'data' => '2019-03-22 15:51:31',
                'id_usuario' => '2',
                'nome' => 'CB2203',
                'sequencia' => '61',
                'id_conta' => 1,
            ),
            357 =>
            array (
                'id' => 358,
                'data' => '2019-03-28 17:49:16',
                'id_usuario' => '2',
                'nome' => 'CB280362.REM',
                'sequencia' => '62',
                'id_conta' => 1,
            ),
            358 =>
            array (
                'id' => 359,
                'data' => '2019-03-31 12:36:02',
                'id_usuario' => '2',
                'nome' => 'CB310363.REM',
                'sequencia' => '63',
                'id_conta' => 1,
            ),
            359 =>
            array (
                'id' => 360,
                'data' => '2019-04-03 11:09:02',
                'id_usuario' => '2',
                'nome' => 'CB030464.REM',
                'sequencia' => '64',
                'id_conta' => 2,
            ),
            360 =>
            array (
                'id' => 361,
                'data' => '2019-04-03 13:43:10',
                'id_usuario' => '2',
                'nome' => 'CB0304',
                'sequencia' => '10',
                'id_conta' => 1,
            ),
            361 =>
            array (
                'id' => 362,
                'data' => '2019-04-09 15:16:50',
                'id_usuario' => '2',
                'nome' => 'CB090466.REM',
                'sequencia' => '66',
                'id_conta' => 1,
            ),
            362 =>
            array (
                'id' => 363,
                'data' => '2019-04-11 09:42:20',
                'id_usuario' => '2',
                'nome' => 'CB110467.REM',
                'sequencia' => '67',
                'id_conta' => 1,
            ),
            363 =>
            array (
                'id' => 364,
                'data' => '2019-04-16 09:03:28',
                'id_usuario' => '2',
                'nome' => 'CB160468.REM',
                'sequencia' => '11',
                'id_conta' => 1,
            ),
            364 =>
            array (
                'id' => 365,
                'data' => '2019-04-17 09:51:13',
                'id_usuario' => '2',
                'nome' => 'CB1704',
                'sequencia' => '69',
                'id_conta' => 1,
            ),
            365 =>
            array (
                'id' => 366,
                'data' => '2019-04-22 09:14:12',
                'id_usuario' => '2',
                'nome' => 'CB220470.REM',
                'sequencia' => '70',
                'id_conta' => 1,
            ),
            366 =>
            array (
                'id' => 367,
                'data' => '2019-04-25 08:49:32',
                'id_usuario' => '2',
                'nome' => 'CB250471.REM',
                'sequencia' => '71',
                'id_conta' => 1,
            ),
            367 =>
            array (
                'id' => 368,
                'data' => '2019-04-29 14:56:09',
                'id_usuario' => '2',
                'nome' => 'CB290472.REM',
                'sequencia' => '72',
                'id_conta' => 1,
            ),
            368 =>
            array (
                'id' => 369,
                'data' => '2019-05-02 15:53:57',
                'id_usuario' => '2',
                'nome' => 'CB020573.REM',
                'sequencia' => '73',
                'id_conta' => 1,
            ),
            369 =>
            array (
                'id' => 370,
                'data' => '2019-05-03 13:38:14',
                'id_usuario' => '2',
                'nome' => 'CB030574.REM',
                'sequencia' => '74',
                'id_conta' => 2,
            ),
            370 =>
            array (
                'id' => 371,
                'data' => '2019-05-06 17:54:19',
                'id_usuario' => '2',
                'nome' => 'CB060575.REM',
                'sequencia' => '12',
                'id_conta' => 1,
            ),
            371 =>
            array (
                'id' => 372,
                'data' => '2019-05-08 15:21:47',
                'id_usuario' => '2',
                'nome' => 'CB0805',
                'sequencia' => '76',
                'id_conta' => 1,
            ),
            372 =>
            array (
                'id' => 373,
                'data' => '2019-05-13 09:32:09',
                'id_usuario' => '2',
                'nome' => 'CB130577.REM',
                'sequencia' => '77',
                'id_conta' => 1,
            ),
            373 =>
            array (
                'id' => 374,
                'data' => '2019-05-16 14:26:07',
                'id_usuario' => '2',
                'nome' => 'CB160578.REM',
                'sequencia' => '78',
                'id_conta' => 1,
            ),
            374 =>
            array (
                'id' => 375,
                'data' => '2019-05-17 08:56:15',
                'id_usuario' => '2',
                'nome' => 'CB170579.REM',
                'sequencia' => '79',
                'id_conta' => 1,
            ),
            375 =>
            array (
                'id' => 376,
                'data' => '2019-05-20 14:36:39',
                'id_usuario' => '2',
                'nome' => 'CB200580.REM',
                'sequencia' => '80',
                'id_conta' => 1,
            ),
            376 =>
            array (
                'id' => 377,
                'data' => '2019-05-21 19:20:25',
                'id_usuario' => '2',
                'nome' => 'CB210581.REM',
                'sequencia' => '81',
                'id_conta' => 1,
            ),
            377 =>
            array (
                'id' => 378,
                'data' => '2019-05-23 15:29:44',
                'id_usuario' => '2',
                'nome' => 'CB230582.REM',
                'sequencia' => '82',
                'id_conta' => 1,
            ),
            378 =>
            array (
                'id' => 379,
                'data' => '2019-05-30 06:12:32',
                'id_usuario' => '2',
                'nome' => 'CB300583.REM',
                'sequencia' => '83',
                'id_conta' => 2,
            ),
            379 =>
            array (
                'id' => 380,
                'data' => '2019-05-31 13:14:45',
                'id_usuario' => '2',
                'nome' => 'CB310584.REM',
                'sequencia' => '13',
                'id_conta' => 2,
            ),
            380 =>
            array (
                'id' => 381,
                'data' => '2019-06-04 13:44:34',
                'id_usuario' => '2',
                'nome' => 'CB040685.REM',
                'sequencia' => '14',
                'id_conta' => 2,
            ),
            381 =>
            array (
                'id' => 382,
                'data' => '2019-06-05 15:18:28',
                'id_usuario' => '2',
                'nome' => 'CB050686.REM',
                'sequencia' => '86',
                'id_conta' => 2,
            ),
            382 =>
            array (
                'id' => 383,
                'data' => '2019-06-07 17:53:28',
                'id_usuario' => '2',
                'nome' => 'CB070687.REM',
                'sequencia' => '87',
                'id_conta' => 2,
            ),
            383 =>
            array (
                'id' => 384,
                'data' => '2019-06-10 16:46:05',
                'id_usuario' => '2',
                'nome' => 'CB100688.REM',
                'sequencia' => '88',
                'id_conta' => 2,
            ),
            384 =>
            array (
                'id' => 385,
                'data' => '2019-06-25 14:31:33',
                'id_usuario' => '2',
                'nome' => 'CB250689.REM',
                'sequencia' => '89',
                'id_conta' => 2,
            ),
            385 =>
            array (
                'id' => 386,
                'data' => '2019-06-26 17:32:21',
                'id_usuario' => '2',
                'nome' => 'CB260690.REM',
                'sequencia' => '90',
                'id_conta' => 2,
            ),
            386 =>
            array (
                'id' => 387,
                'data' => '2019-06-27 13:09:25',
                'id_usuario' => '0',
                'nome' => 'CB270691.REM',
                'sequencia' => '91',
                'id_conta' => 2,
            ),
            387 =>
            array (
                'id' => 388,
                'data' => '2019-06-28 11:44:26',
                'id_usuario' => '2',
                'nome' => 'CB280692.REM',
                'sequencia' => '15',
                'id_conta' => 2,
            ),
            388 =>
            array (
                'id' => 389,
                'data' => '2019-07-04 18:01:45',
                'id_usuario' => '2',
                'nome' => 'CB040793.REM',
                'sequencia' => '93',
                'id_conta' => 2,
            ),
            389 =>
            array (
                'id' => 390,
                'data' => '2019-07-11 09:51:20',
                'id_usuario' => '2',
                'nome' => 'CB110794.REM',
                'sequencia' => '94',
                'id_conta' => 2,
            ),
            390 =>
            array (
                'id' => 391,
                'data' => '2019-07-12 13:15:32',
                'id_usuario' => '2',
                'nome' => 'CB1207',
                'sequencia' => '95',
                'id_conta' => 2,
            ),
            391 =>
            array (
                'id' => 392,
                'data' => '2019-07-17 14:21:28',
                'id_usuario' => '2',
                'nome' => 'CB170796.REM',
                'sequencia' => '96',
                'id_conta' => 2,
            ),
            392 =>
            array (
                'id' => 393,
                'data' => '2019-07-22 17:53:50',
                'id_usuario' => '2',
                'nome' => 'CB220797.REM',
                'sequencia' => '97',
                'id_conta' => 2,
            ),
            393 =>
            array (
                'id' => 394,
                'data' => '2019-07-23 21:36:05',
                'id_usuario' => '2',
                'nome' => 'CB240798.REM',
                'sequencia' => '16',
                'id_conta' => 2,
            ),
            394 =>
            array (
                'id' => 395,
                'data' => '2019-07-26 11:48:30',
                'id_usuario' => '2',
                'nome' => 'CB260799.REM',
                'sequencia' => '99',
                'id_conta' => 2,
            ),
            395 =>
            array (
                'id' => 396,
                'data' => '2019-07-30 15:28:48',
                'id_usuario' => '2',
                'nome' => 'CB300701.REM',
                'sequencia' => '1',
                'id_conta' => 2,
            ),
            396 =>
            array (
                'id' => 397,
                'data' => '2019-08-05 09:36:37',
                'id_usuario' => '2',
                'nome' => 'CB050802.REM',
                'sequencia' => '2',
                'id_conta' => 2,
            ),
            397 =>
            array (
                'id' => 398,
                'data' => '2019-08-06 08:52:16',
                'id_usuario' => '0',
                'nome' => 'CB060803.REM',
                'sequencia' => '3',
                'id_conta' => 2,
            ),
            398 =>
            array (
                'id' => 399,
                'data' => '2019-08-13 14:01:38',
                'id_usuario' => '2',
                'nome' => 'CB130804.REM',
                'sequencia' => '4',
                'id_conta' => 2,
            ),
            399 =>
            array (
                'id' => 400,
                'data' => '2019-08-19 14:31:53',
                'id_usuario' => '2',
                'nome' => 'CB190805.REM',
                'sequencia' => '5',
                'id_conta' => 1,
            ),
            400 =>
            array (
                'id' => 401,
                'data' => '2019-08-22 14:08:44',
                'id_usuario' => '2',
                'nome' => 'CB220806.REM',
                'sequencia' => '6',
                'id_conta' => 1,
            ),
            401 =>
            array (
                'id' => 402,
                'data' => '2019-08-27 10:28:42',
                'id_usuario' => '2',
                'nome' => 'CB270807.REM',
                'sequencia' => '7',
                'id_conta' => 1,
            ),
            402 =>
            array (
                'id' => 403,
                'data' => '2019-08-30 10:22:32',
                'id_usuario' => '2',
                'nome' => 'CB300808.REM',
                'sequencia' => '8',
                'id_conta' => 1,
            ),
            403 =>
            array (
                'id' => 404,
                'data' => '2019-09-03 08:53:22',
                'id_usuario' => '2',
                'nome' => 'CB030909.REM',
                'sequencia' => '9',
                'id_conta' => 2,
            ),
            404 =>
            array (
                'id' => 405,
                'data' => '2019-09-04 17:44:44',
                'id_usuario' => '2',
                'nome' => 'CB0409',
                'sequencia' => '10',
                'id_conta' => 1,
            ),
            405 =>
            array (
                'id' => 406,
                'data' => '2019-09-09 15:10:27',
                'id_usuario' => '2',
                'nome' => 'CB0909',
                'sequencia' => '11',
                'id_conta' => 1,
            ),
            406 =>
            array (
                'id' => 407,
                'data' => '2019-09-11 17:35:31',
                'id_usuario' => '2',
                'nome' => 'CB110912.REM',
                'sequencia' => '2',
                'id_conta' => 1,
            ),
            407 =>
            array (
                'id' => 408,
                'data' => '2019-09-20 09:08:33',
                'id_usuario' => '2',
                'nome' => 'CB200913.REM',
                'sequencia' => '13',
                'id_conta' => 1,
            ),
            408 =>
            array (
                'id' => 409,
                'data' => '2019-09-24 09:19:50',
                'id_usuario' => '2',
                'nome' => 'CB2409',
                'sequencia' => '14',
                'id_conta' => 1,
            ),
            409 =>
            array (
                'id' => 410,
                'data' => '2019-09-27 15:51:03',
                'id_usuario' => '2',
                'nome' => 'CB270915.REM',
                'sequencia' => '15',
                'id_conta' => 1,
            ),
            410 =>
            array (
                'id' => 411,
                'data' => '2019-10-01 12:22:01',
                'id_usuario' => '2',
                'nome' => 'CB011016.REM',
                'sequencia' => '16',
                'id_conta' => 2,
            ),
            411 =>
            array (
                'id' => 412,
                'data' => '2019-10-02 13:26:50',
                'id_usuario' => '2',
                'nome' => 'CB021017.REM',
                'sequencia' => '3',
                'id_conta' => 1,
            ),
            412 =>
            array (
                'id' => 413,
                'data' => '2019-10-10 08:54:01',
                'id_usuario' => '2',
                'nome' => 'CB101018.REM',
                'sequencia' => '18',
                'id_conta' => 1,
            ),
            413 =>
            array (
                'id' => 414,
                'data' => '2019-10-14 13:44:05',
                'id_usuario' => '2',
                'nome' => 'CB141019.REM',
                'sequencia' => '19',
                'id_conta' => 1,
            ),
            414 =>
            array (
                'id' => 415,
                'data' => '2019-10-23 10:46:23',
                'id_usuario' => '2',
                'nome' => 'CB231020.REM',
                'sequencia' => '20',
                'id_conta' => 1,
            ),
            415 =>
            array (
                'id' => 416,
                'data' => '2019-10-30 15:11:02',
                'id_usuario' => '2',
                'nome' => 'CB301021.REM',
                'sequencia' => '21',
                'id_conta' => 1,
            ),
            416 =>
            array (
                'id' => 417,
                'data' => '2019-11-05 15:53:24',
                'id_usuario' => '0',
                'nome' => 'CB051122.REM',
                'sequencia' => '22',
                'id_conta' => 2,
            ),
            417 =>
            array (
                'id' => 418,
                'data' => '2019-11-05 17:31:35',
                'id_usuario' => '2',
                'nome' => 'CB0511',
                'sequencia' => '23',
                'id_conta' => 1,
            ),
            418 =>
            array (
                'id' => 419,
                'data' => '2019-11-11 09:14:57',
                'id_usuario' => '2',
                'nome' => 'CB111124.REM',
                'sequencia' => '24',
                'id_conta' => 1,
            ),
            419 =>
            array (
                'id' => 420,
                'data' => '2019-11-13 14:58:48',
                'id_usuario' => '2',
                'nome' => 'CB131127.REM',
                'sequencia' => '27',
                'id_conta' => 1,
            ),
            420 =>
            array (
                'id' => 421,
                'data' => '2019-11-13 09:14:57',
                'id_usuario' => '2',
                'nome' => 'CB131126.REM',
                'sequencia' => '26',
                'id_conta' => 1,
            ),
            421 =>
            array (
                'id' => 422,
                'data' => '2019-11-22 12:12:04',
                'id_usuario' => '2',
                'nome' => 'CB221127.REM',
                'sequencia' => '27',
                'id_conta' => 1,
            ),
            422 =>
            array (
                'id' => 423,
                'data' => '2019-11-26 08:00:29',
                'id_usuario' => '2',
                'nome' => 'CB261128.REM',
                'sequencia' => '28',
                'id_conta' => 1,
            ),
            423 =>
            array (
                'id' => 424,
                'data' => '2019-11-27 13:50:51',
                'id_usuario' => '2',
                'nome' => 'CB271129.REM',
                'sequencia' => '29',
                'id_conta' => 1,
            ),
            424 =>
            array (
                'id' => 425,
                'data' => '2019-11-29 13:33:33',
                'id_usuario' => '2',
                'nome' => 'CB291130.REM',
                'sequencia' => '30',
                'id_conta' => 1,
            ),
            425 =>
            array (
                'id' => 426,
                'data' => '2019-12-02 15:30:35',
                'id_usuario' => '2',
                'nome' => 'CB021231.REM',
                'sequencia' => '31',
                'id_conta' => 2,
            ),
            426 =>
            array (
                'id' => 427,
                'data' => '2019-12-04 16:21:28',
                'id_usuario' => '2',
                'nome' => 'CB041232.REM',
                'sequencia' => '32',
                'id_conta' => 1,
            ),
            427 =>
            array (
                'id' => 428,
                'data' => '2019-12-09 06:27:04',
                'id_usuario' => '2',
                'nome' => 'CB091233.REM',
                'sequencia' => '33',
                'id_conta' => 1,
            ),
            428 =>
            array (
                'id' => 429,
                'data' => '2019-12-11 16:00:13',
                'id_usuario' => '2',
                'nome' => 'CB111234.REM',
                'sequencia' => '34',
                'id_conta' => 1,
            ),
            429 =>
            array (
                'id' => 430,
                'data' => '2019-12-23 11:39:58',
                'id_usuario' => '1',
                'nome' => 'CB231235.REM',
                'sequencia' => '35',
                'id_conta' => 2,
            ),
            430 =>
            array (
                'id' => 431,
                'data' => '2019-12-27 09:07:46',
                'id_usuario' => '6',
                'nome' => 'CB271236.REM',
                'sequencia' => '36',
                'id_conta' => 1,
            ),
        ));


    }
}
