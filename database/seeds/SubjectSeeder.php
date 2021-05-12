<?php

use App\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Subject::create([
        //     'subject_code' => 'ORAL-341',
        //     'subject_name' => 'Oral Communication',
        //     'subject_description' => 'Core Curriculum Subject'
        // ]);

        // Subject::create([
        //     'subject_code' => 'APPEC-236',
        //     'subject_name' => 'Applied Economics',
        //     'subject_description' => 'Specialized Subject'
        // ]);

        Subject::create([
            'subject_code' => 'ORAL-119',
            'subject_name' => 'Oral Communication',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'GENMATH-120',
            'subject_name' => 'General Mathematics',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'PE-121',
            'subject_name' => 'Physical Education and Health',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'PERDEV-110',
            'subject_name' => 'Personal Development/Pansariling Kaunlaran',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'STATS-111',
            'subject_name' => 'Statistics and Probability',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'MEDINFO-112',
            'subject_name' => 'Media and Information Literacy',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'ELS-113',
            'subject_name' => 'Earth and Life Science (Lecture and Laboratory)',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'UCSP-114',
            'subject_name' => 'Understanding Culture, Society and Politics',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'PHYSCIE-115',
            'subject_name' => 'Physical Science (Lecture and Laboratory)',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'INTROPHILO-116',
            'subject_name' => 'Introduction to the Philosophy of the Human Person',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'CONTEM-117',
            'subject_name' => 'Contemporary Philippine Arts from the Regions',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => '21stCEN-118',
            'subject_name' => '21st Century Literature from the Philippines and the World',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'REWRI-122',
            'subject_name' => 'Reading and Writing',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'KPK-123',
            'subject_name' => 'Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'PPP-124',
            'subject_name' => 'Pagbabasa at Pagsusuri sa Pananaliksik',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'EAPP-210',
            'subject_name' => 'English for Academics and Professional Purpose',
            'subject_description' => 'Applied Track Subject'
        ]);

        Subject::create([
            'subject_code' => 'PRAC1-211',
            'subject_name' => 'Practical Research 1',
            'subject_description' => 'Applied Track Subject'
        ]);

        Subject::create([
            'subject_code' => 'PRAC2-212',
            'subject_name' => 'Practical Research',
            'subject_description' => 'Applied Track Subject'
        ]);

        Subject::create([
            'subject_code' => 'FPL-213',
            'subject_name' => 'Filipino sa Piling Larangan(Akademik, Isports, Sining at Tech-Voc)',
            'subject_description' => 'Applied Track Subject'
        ]);

        Subject::create([
            'subject_code' => 'EMPTECH-214',
            'subject_name' => 'Empowerment Technologies (for the Strand)
     ',
            'subject_description' => 'Applied Track Subject'
        ]);

        Subject::create([
            'subject_code' => 'ENTREP-215',
            'subject_name' => 'Entrepreneurship',
            'subject_description' => 'Applied Truck Subject'
        ]);

        Subject::create([
            'subject_code' => 'III-216',
            'subject_name' => 'Inquiries, Investigations and Immersion',
            'subject_description' => 'Applied Truck Subject'
        ]);

        Subject::create([
            'subject_code' => 'APPEC-310',
            'subject_name' => 'Applied Economics',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'HUM1-311',
            'subject_name' => 'Humanities 1',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'HUM2-312',
            'subject_name' => 'Humanities 2',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'SOSCIE-313',
            'subject_name' => 'Humanities 2',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'ORGM-314',
            'subject_name' => 'Organization and Management',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'BESR-315',
            'subject_name' => 'Business Ethics and Social Responsibility',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'FBM1-316',
            'subject_name' => 'Fundamentals of Accountancy, Business and Management 1',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'FBM2-317',
            'subject_name' => 'Fundamentals of Accountancy, Business and Management 2',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'PRIN-318',
            'subject_name' => 'Principles of Marketing',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'ESCIE-125',
            'subject_name' => 'Earth Science',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'DRRR-126',
            'subject_name' => 'Disaster Readiness and Risk Reduction ',
            'subject_description' => 'Core Curriculum Subject'
        ]);

        Subject::create([
            'subject_code' => 'PRE-CAL-319',
            'subject_name' => 'Pre-Calculus',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'BACAL-320',
            'subject_name' => 'Basic Calculus',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'GENBIO1-321',
            'subject_name' => 'General Biology 1',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'GENBIO2-322',
            'subject_name' => 'General Biology 2',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'CREWRI-323',
            'subject_name' => 'Creative Writing / Malikhaing Pagsulat',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'CRENON-324',
            'subject_name' => 'Creative Nonfiction',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'IWRBS-325',
            'subject_name' => 'Introduction to World Religions and Belief Systems',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'TNC-326',
            'subject_name' => 'Trends, Networks and Critical Thinking in the 21st Century',
            'subject_description' => 'Specialized Subject'
        ]);

        Subject::create([
            'subject_code' => 'PPG-327',
            'subject_name' => 'Philippine Politics and Governance',
            'subject_description' => 'Specialized Subject'
        ]);
    }
}