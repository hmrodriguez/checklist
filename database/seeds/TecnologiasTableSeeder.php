<?php

use Illuminate\Database\Seeder;

class TecnologiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tecnologias = 
        [
        	'PHP',
            'Python',
            'MySQL',
            'MS SQL Server',
            'Html',
            'Html5',
            'CSS',
            'CSS3',
            'JavaScript',
            'JQuery',
            'Ajax',
            'GIT',
            'SVN',
            'Joomla',
            'ORM',
            'MVC',
            'Angular',
            'Node',
            'React',
            'Linux RHEL / CentOS',
            'Linux Debian/Ubuntu',
            'Windows Server',
            'Active Directory',
            'ASP .NET',
            'C#',
            'Knockout'
        ];

        foreach($tecnologias as $tecnologia)
        {
			DB::table('tecnologias')->insert([				
	            'nombre' => $tecnologia
			]);        	
        }
    }
}
