<?php

use App\SchoolClass;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SchoolClass::create([
            'class_code' => 'ORAL-119-1',
            'employee_id' => '32',
            'subject_id' => '1',
            'schedule' => '7:00 AM - 8:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'GENMATH-120-2',
            'employee_id' => '15',
            'subject_id' => '2',
            'schedule' => '8:00 AM - 9:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'PE-121-3',
            'employee_id' => '17',
            'subject_id' => '3',
            'schedule' => '10:00 AM - 11:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'PERDEV-110-4',
            'employee_id' => '26',
            'subject_id' => '4',
            'schedule' => '11:10 AM - 12:10 NN'
        ]);


        SchoolClass::create([
            'class_code' => 'STATS-111-5',
            'employee_id' => '30',
            'subject_id' => '5',
            'schedule' => '12:10 NN - 1:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'MEDINFO-112-6',
            'employee_id' => '25',
            'subject_id' => '6',
            'schedule' => '1:10 PM - 2:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'ELS-113-7',
            'employee_id' => '21',
            'subject_id' => '7',
            'schedule' => '2:10 PM - 3:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'UCSP-114-8',
            'employee_id' => '28',
            'subject_id' => '8',
            'schedule' => '3:30 PM -4:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'PHYSCIE-115-9',
            'employee_id' => '31',
            'subject_id' => '9',
            'schedule' => '4:30 PM - 5:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'INTROPHILO-116-10',
            'employee_id' => '29',
            'subject_id' => '10',
            'schedule' => '5:30 PM - 6:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'CONTEM-117-11',
            'employee_id' => '19',
            'subject_id' => '11',
            'schedule' => '6:30 PM - 7:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => '21stCEN-118-12',
            'employee_id' => '1',
            'subject_id' => '12',
            'schedule' => '7:00 AM - 8:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'REWRI-119-13',
            'employee_id' => '2',
            'subject_id' => '13',
            'schedule' => '8:00 AM - 9:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'KPK-123-14',
            'employee_id' => '3',
            'subject_id' => '14',
            'schedule' => '10:00 AM - 11:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'PPP-124-15',
            'employee_id' => '4',
            'subject_id' => '15',
            'schedule' => '11:10 AM - 12:10 NN'
        ]);

        SchoolClass::create([
            'class_code' => 'EAPP-210-16',
            'employee_id' => '5',
            'subject_id' => '16',
            'schedule' => '12:10 NN - 1:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'PRAC1-211-17',
            'employee_id' => '6',
            'subject_id' => '17',
            'schedule' => '1:10 PM - 2:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'PRAC2-212-18',
            'employee_id' => '7',
            'subject_id' => '18',
            'schedule' => '2:10 PM - 3:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'FPL-213-19',
            'employee_id' => '8',
            'subject_id' => '19',
            'schedule' => '3:30 PM - 4:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'EMPTECH-214-20',
            'employee_id' => '9',
            'subject_id' => '20',
            'schedule' =>  '4:30 PM - 5:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'ENTREP-215-21',
            'employee_id' => '10',
            'subject_id' => '21',
            'schedule' =>  '5:30 PM - 6:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'III-216-22',
            'employee_id' => '11',
            'subject_id' => '22',
            'schedule' => '6:30 PM - 7:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'APPEC-310-23',
            'employee_id' => '12',
            'subject_id' => '23',
            'schedule' => '7:00 AM - 8:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'HUM-311-24',
            'employee_id' => '13',
            'subject_id' => '24',
            'schedule' => '8:00 AM - 9:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'HUM2-312-25',
            'employee_id' => '14',
            'subject_id' => '25',
            'schedule' => '9:00 AM - 10:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'SOSCIE-313-26',
            'employee_id' => '29',
            'subject_id' => '26',
            'schedule' => '10:00 AM - 11:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'ORGM-314-27',
            'employee_id' => '16',
            'subject_id' => '27',
            'schedule' => '11:10 AM - 12:10 NN'
        ]);

        SchoolClass::create([
            'class_code' => 'BERS-315-28',
            'employee_id' => '20',
            'subject_id' => '28',
            'schedule' => '12:10 NN - 1:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'FBM1-316-29',
            'employee_id' => '22',
            'subject_id' => '29',
            'schedule' => '1:10 PM - 2:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'FBM2-317-30',
            'employee_id' => '23',
            'subject_id' => '30',
            'schedule' => '2:10 PM - 3:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'PRIN-318-31',
            'employee_id' => '24',
            'subject_id' => '31',
            'schedule' => '3:30 PM - 4:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'ESCIE-125-32',
            'employee_id' => '27',
            'subject_id' => '32',
            'schedule' => '4:30 PM - 5:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'DRRR-126-33',
            'employee_id' => '18',
            'subject_id' => '33',
            'schedule' => '5:30 PM - 6:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'PRE-CAL-319-34',
            'employee_id' => '30',
            'subject_id' => '34',
            'schedule' => '6:30 PM - 7:30 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'BACAL-319-35',
            'employee_id' => '27',
            'subject_id' => '35',
            'schedule' => '7:00 AM - 8:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'GENBIO1-321-36',
            'employee_id' => '31',
            'subject_id' => '36',
            'schedule' => '8:00 AM - 9:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'GENBIO2-322-37',
            'employee_id' => '32',
            'subject_id' => '37',
            'schedule' => '9:00 AM - 10:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'CREWRI-323-38',
            'employee_id' => '21',
            'subject_id' => '38',
            'schedule' => '10:00 AM - 11:00 AM'
        ]);

        SchoolClass::create([
            'class_code' => 'CRENON-434-39',
            'employee_id' => '11',
            'subject_id' => '39',
            'schedule' => '11:10 AM - 12:10 NN'
        ]);

        SchoolClass::create([
            'class_code' => 'IWRBS-325-40',
            'employee_id' => '19',
            'subject_id' => '40',
            'schedule' => '12:10 NN - 1:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'TNC-326-41',
            'employee_id' => '20',
            'subject_id' => '41',
            'schedule' => '1:10 PM - 2:10 PM'
        ]);

        SchoolClass::create([
            'class_code' => 'PPG-327-42',
            'employee_id' => '26',
            'subject_id' => '42',
            'schedule' => '2:10 PM - 3:10 PM'
        ]);
    }
}