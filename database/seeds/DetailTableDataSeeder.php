<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Companiesdata = [
            ['company_name' => 'Hexamarvel Technologies','email_id'=>'hexamarvel@gmail.com','phone_number'=>'123456789'],
            ['company_name' => 'Tidle Park','email_id'=>'tidlepark@gmail.com','phone_number'=>'1111111111'],
            ['company_name' => 'HCL','email_id'=>'hcl@gmail.com','phone_number'=>'2222222222'],
        ];
		$Branchesdata = [
            ['branch_name' => 'Coimbatore','branch_id'=>1,'address'=>"demo address 1",'city'=>'city 1','state'=>'Tamilnadu'],
            ['branch_name' => 'OOty','branch_id'=>2,'address'=>"demo address 2",'city'=>'city 2','state'=>'Tamilnadu'],
            ['branch_name' => 'Chennai','branch_id'=>3,'address'=>"demo address 3",'city'=>'city 3','state'=>'Tamilnadu'],
        ];
		$Designationdata = [
            ['designation_name' => 'Designation 1','short_code'=>'1234'],
            ['designation_name' => 'Designation 2','short_code'=>'12345'],
            ['designation_name' => 'Designation 3','short_code'=>'123456'],
        ];
		
		
		DB::table('companies')->insert($Companiesdata);
		DB::table('branches')->insert($Branchesdata);
		DB::table('designations')->insert($Designationdata);
    }
}
