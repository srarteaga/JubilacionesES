<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        $this->call('principalSeeder');
        $this->call('seederJubilaciones');
    }
}

class principalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$direcciones = array(
            array('Dirección General de la Oficina de Atención al Ciudadano','a.ciudadano'),
            array('Dirección General de Administración','administracion'),
            array('Dirección General de Auditoria Interna','auditoria'),
            array('Dirección General de consultoría Jurídica','consultoria'),
            array('Dirección General de Comunicaciones y Relaciones Institucionales','d.comunicaciones'),
            array('Dirección General','d.general'),
            array('Dirección General de Seguridad Integral','d.seguridad'),
            array('Dirección General de Delegaciones e Instrucciones Presidenciales','delegaciones'),
            array('Despacho del Vicepresidente','despacho'),
            array('Dirección General de Planificación Estratégica y Presupuesto','planificacionypresupuesto'),
            array('Dirección General de Recursos Humanos','rrhh'),
            array('Dirección General de Seguimiento y Control de Políticas Públicas','seguimientoycontrol'),
            array('Dirección General de Tecnología de la Información','tecnologia'),
        );*/

        /*foreach($direcciones as $k){
            DB::table('direcciones')->insert([
            'opcion' => $k[0],
            'conversion' => $k[1],
            ]);    
        }*/

        $roles = array(
            'Administrador', 
            'Básico'
        );

        foreach($roles as $r){
            DB::table('roles')->insert([
            'opcion' => $r,
            ]);    
        }
        $users = array(

            array('1', 'srarteaga', '1')
        );

        foreach($users as $r){
            DB::table('users')->insert([
            'id' => $r[0],
            'user' => $r[1],
            'rol' => $r[2],
            ]);    
        }
    }
}
