<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data structure: [state_code, state_name]
        $data = [
            // Alabama
            ['205', 'Alabama'],
            ['251', 'Alabama'],
            ['256', 'Alabama'],
            ['334', 'Alabama'],
            ['938', 'Alabama'],
            // Alaska
            ['907', 'Alaska'],
            // Arizona
            ['480', 'Arizona'],
            ['520', 'Arizona'],
            ['602', 'Arizona'],
            ['623', 'Arizona'],
            ['928', 'Arizona'],
            // Arkansas
            ['479', 'Arkansas'],
            ['501', 'Arkansas'],
            ['870', 'Arkansas'],
            // California
            ['209', 'California'],
            ['213', 'California'],
            ['310', 'California'],
            ['323', 'California'],
            ['408', 'California'],
            ['415', 'California'],
            ['424', 'California'],
            ['442', 'California'],
            ['510', 'California'],
            ['530', 'California'],
            ['559', 'California'],
            ['562', 'California'],
            ['619', 'California'],
            ['626', 'California'],
            ['628', 'California'],
            ['650', 'California'],
            ['657', 'California'],
            ['661', 'California'],
            ['669', 'California'],
            ['707', 'California'],
            ['714', 'California'],
            ['747', 'California'],
            ['760', 'California'],
            ['805', 'California'],
            ['818', 'California'],
            ['831', 'California'],
            ['858', 'California'],
            ['909', 'California'],
            ['916', 'California'],
            ['925', 'California'],
            ['949', 'California'],
            ['951', 'California'],
            // North Carolina (Carolina del Norte)
            ['252', 'North Carolina'],
            ['336', 'North Carolina'],
            ['704', 'North Carolina'],
            ['743', 'North Carolina'],
            ['828', 'North Carolina'],
            ['910', 'North Carolina'],
            ['919', 'North Carolina'],
            ['980', 'North Carolina'],
            ['984', 'North Carolina'],
            // South Carolina (Carolina del Sur)
            ['803', 'South Carolina'],
            ['839', 'South Carolina'],
            ['843', 'South Carolina'],
            ['854', 'South Carolina'],
            ['864', 'South Carolina'],
            // Colorado
            ['303', 'Colorado'],
            ['719', 'Colorado'],
            ['720', 'Colorado'],
            ['970', 'Colorado'],
            // Connecticut
            ['203', 'Connecticut'],
            ['475', 'Connecticut'],
            ['860', 'Connecticut'],
            ['959', 'Connecticut'],
            // North Dakota (Dakota del Norte)
            ['701', 'North Dakota'],
            // South Dakota (Dakota del Sur)
            ['605', 'South Dakota'],
            // Delaware
            ['302', 'Delaware'],
            // Florida
            ['239', 'Florida'],
            ['305', 'Florida'],
            ['321', 'Florida'],
            ['352', 'Florida'],
            ['386', 'Florida'],
            ['407', 'Florida'],
            ['561', 'Florida'],
            ['727', 'Florida'],
            ['754', 'Florida'],
            ['772', 'Florida'],
            ['786', 'Florida'],
            ['813', 'Florida'],
            ['850', 'Florida'],
            ['863', 'Florida'],
            ['904', 'Florida'],
            ['954', 'Florida'],
            // Georgia
            ['229', 'Georgia'],
            ['404', 'Georgia'],
            ['470', 'Georgia'],
            ['478', 'Georgia'],
            ['668', 'Georgia'],
            ['706', 'Georgia'],
            ['762', 'Georgia'],
            ['770', 'Georgia'],
            ['912', 'Georgia'],
            // Hawaii (Hawái)
            ['808', 'Hawaii'],
            // Idaho
            ['208', 'Idaho'],
            ['986', 'Idaho'],
            // Illinois
            ['217', 'Illinois'],
            ['224', 'Illinois'],
            ['309', 'Illinois'],
            ['312', 'Illinois'],
            ['331', 'Illinois'],
            ['618', 'Illinois'],
            ['630', 'Illinois'],
            ['708', 'Illinois'],
            ['773', 'Illinois'],
            ['779', 'Illinois'],
            ['815', 'Illinois'],
            ['847', 'Illinois'],
            ['872', 'Illinois'],
            // Indiana
            ['219', 'Indiana'],
            ['260', 'Indiana'],
            ['317', 'Indiana'],
            ['463', 'Indiana'],
            ['574', 'Indiana'],
            ['765', 'Indiana'],
            ['812', 'Indiana'],
            ['930', 'Indiana'],
            // Iowa
            ['319', 'Iowa'],
            ['515', 'Iowa'],
            ['563', 'Iowa'],
            ['641', 'Iowa'],
            ['712', 'Iowa'],
            // Kansas
            ['316', 'Kansas'],
            ['620', 'Kansas'],
            ['785', 'Kansas'],
            ['913', 'Kansas'],
            // Kentucky
            ['270', 'Kentucky'],
            ['364', 'Kentucky'],
            ['502', 'Kentucky'],
            ['606', 'Kentucky'],
            ['859', 'Kentucky'],
            // Louisiana (Luisiana)
            ['225', 'Louisiana'],
            ['318', 'Louisiana'],
            ['337', 'Louisiana'],
            ['504', 'Louisiana'],
            ['985', 'Louisiana'],
            // Maine
            ['207', 'Maine'],
            // Maryland
            ['240', 'Maryland'],
            ['301', 'Maryland'],
            ['410', 'Maryland'],
            ['443', 'Maryland'],
            ['667', 'Maryland'],
            // Massachusetts
            ['339', 'Massachusetts'],
            ['351', 'Massachusetts'],
            ['413', 'Massachusetts'],
            ['508', 'Massachusetts'],
            ['617', 'Massachusetts'],
            ['774', 'Massachusetts'],
            ['781', 'Massachusetts'],
            ['857', 'Massachusetts'],
            ['978', 'Massachusetts'],
            // Michigan (Míchigan)
            ['231', 'Michigan'],
            ['248', 'Michigan'],
            ['269', 'Michigan'],
            ['313', 'Michigan'],
            ['517', 'Michigan'],
            ['586', 'Michigan'],
            ['616', 'Michigan'],
            ['679', 'Michigan'],
            ['734', 'Michigan'],
            ['810', 'Michigan'],
            ['906', 'Michigan'],
            ['947', 'Michigan'],
            ['989', 'Michigan'],
            // Minnesota
            ['218', 'Minnesota'],
            ['320', 'Minnesota'],
            ['507', 'Minnesota'],
            ['612', 'Minnesota'],
            ['651', 'Minnesota'],
            ['763', 'Minnesota'],
            ['952', 'Minnesota'],
            // Mississippi (Misisipi)
            ['228', 'Mississippi'],
            ['601', 'Mississippi'],
            ['662', 'Mississippi'],
            ['769', 'Mississippi'],
            // Missouri (Misuri)
            ['314', 'Missouri'],
            ['417', 'Missouri'],
            ['573', 'Missouri'],
            ['636', 'Missouri'],
            ['660', 'Missouri'],
            ['816', 'Missouri'],
            // Montana
            ['406', 'Montana'],
            // Nebraska
            ['308', 'Nebraska'],
            ['402', 'Nebraska'],
            ['531', 'Nebraska'],
            // Nevada
            ['702', 'Nevada'],
            ['725', 'Nevada'],
            ['775', 'Nevada'],
            // New Hampshire (Nueva Hampshire)
            ['603', 'New Hampshire'],
            // New Jersey (Nueva Jersey)
            ['201', 'New Jersey'],
            ['551', 'New Jersey'],
            ['609', 'New Jersey'],
            ['640', 'New Jersey'],
            ['732', 'New Jersey'],
            ['848', 'New Jersey'],
            ['856', 'New Jersey'],
            ['862', 'New Jersey'],
            ['908', 'New Jersey'],
            ['973', 'New Jersey'],
            // New Mexico (Nuevo México)
            ['505', 'New Mexico'],
            ['575', 'New Mexico'],
            // New York (Nueva York)
            ['212', 'New York'],
            ['315', 'New York'],
            ['332', 'New York'],
            ['347', 'New York'],
            ['516', 'New York'],
            ['518', 'New York'],
            ['585', 'New York'],
            ['607', 'New York'],
            ['631', 'New York'],
            ['646', 'New York'],
            ['680', 'New York'],
            ['716', 'New York'],
            ['718', 'New York'],
            ['838', 'New York'],
            ['845', 'New York'],
            ['914', 'New York'],
            ['917', 'New York'],
            ['929', 'New York'],
            ['934', 'New York'],
            // Ohio
            ['216', 'Ohio'],
            ['220', 'Ohio'],
            ['234', 'Ohio'],
            ['330', 'Ohio'],
            ['380', 'Ohio'],
            ['419', 'Ohio'],
            ['440', 'Ohio'],
            ['513', 'Ohio'],
            ['567', 'Ohio'],
            ['614', 'Ohio'],
            ['740', 'Ohio'],
            ['937', 'Ohio'],
            // Oklahoma
            ['405', 'Oklahoma'],
            ['539', 'Oklahoma'],
            ['580', 'Oklahoma'],
            ['918', 'Oklahoma'],
            // Oregon (Oregón)
            ['458', 'Oregon'],
            ['503', 'Oregon'],
            ['541', 'Oregon'],
            ['971', 'Oregon'],
            // Pennsylvania (Pensilvania)
            ['215', 'Pennsylvania'],
            ['223', 'Pennsylvania'],
            ['267', 'Pennsylvania'],
            ['272', 'Pennsylvania'],
            ['412', 'Pennsylvania'],
            ['484', 'Pennsylvania'],
            ['570', 'Pennsylvania'],
            ['610', 'Pennsylvania'],
            ['717', 'Pennsylvania'],
            ['724', 'Pennsylvania'],
            ['814', 'Pennsylvania'],
            ['878', 'Pennsylvania'],
            // Rhode Island
            ['401', 'Rhode Island'],
            // Tennessee
            ['423', 'Tennessee'],
            ['615', 'Tennessee'],
            ['629', 'Tennessee'],
            ['731', 'Tennessee'],
            ['865', 'Tennessee'],
            ['901', 'Tennessee'],
            ['931', 'Tennessee'],
            // Texas
            ['210', 'Texas'],
            ['214', 'Texas'],
            ['254', 'Texas'],
            ['281', 'Texas'],
            ['325', 'Texas'],
            ['346', 'Texas'],
            ['361', 'Texas'],
            ['409', 'Texas'],
            ['430', 'Texas'],
            ['432', 'Texas'],
            ['469', 'Texas'],
            ['512', 'Texas'],
            ['682', 'Texas'],
            ['713', 'Texas'],
            ['726', 'Texas'],
            ['737', 'Texas'],
            ['806', 'Texas'],
            ['817', 'Texas'],
            ['830', 'Texas'],
            ['832', 'Texas'],
            ['903', 'Texas'],
            ['915', 'Texas'],
            ['936', 'Texas'],
            ['940', 'Texas'],
            ['956', 'Texas'],
            ['972', 'Texas'],
            ['979', 'Texas'],
            // Utah
            ['385', 'Utah'],
            ['435', 'Utah'],
            ['801', 'Utah'],
            // Vermont
            ['802', 'Vermont'],
            // Virginia
            ['276', 'Virginia'],
            ['434', 'Virginia'],
            ['540', 'Virginia'],
            ['571', 'Virginia'],
            ['703', 'Virginia'],
            ['757', 'Virginia'],
            ['804', 'Virginia'],
            // West Virginia (Virginia Occidental)
            ['304', 'West Virginia'],
            ['681', 'West Virginia'],
            // Washington
            ['206', 'Washington'],
            ['253', 'Washington'],
            ['360', 'Washington'],
            ['425', 'Washington'],
            ['509', 'Washington'],
            ['564', 'Washington'],
            // Wisconsin
            ['262', 'Wisconsin'],
            ['414', 'Wisconsin'],
            ['534', 'Wisconsin'],
            ['608', 'Wisconsin'],
            ['715', 'Wisconsin'],
            ['920', 'Wisconsin'],
            // Wyoming
            ['307', 'Wyoming'],
        ];

        $statesToInsert = [];
        foreach ($data as $row) {
            $statesToInsert[] = [
                'state_code' => $row[0],
                'state_name' => $row[1],
            ];
        }
        // Insert the data into the 'us_states' table
        DB::table('us_states')->insert($statesToInsert);
    }
}