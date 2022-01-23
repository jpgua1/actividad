<?php

require_once('../model/platformM.php');

function initConnectionDb()
{
    $dbconn = pg_connect('host=localhost port=5432 dbname=Actividad1 user=postgres password=Crowzard12') or die("Could not connect");

    return $dbconn;
}


function insertPlatform($platformName)
{
    $dbcon = initConnectionDb();
    $platformCreate = false;
    $query = pg_query($dbcon, "INSERT  INTO platform(name) VALUES ('$platformName');");

    if ($resultInsert = $query) {
        $platformCreate = true;
    }
    $dbcon = pg_close();

    return $platformCreate;
}



function listPlatform()
{
    $dbcon=initConnectionDb();
    $query = pg_query($dbcon,"SELECT * FROM platform");
    $arrayPlatform =[];
    while ($row = pg_fetch_row($query)) {

        $liPlatform=new platformM($row[0],$row[1]);
        array_push($arrayPlatform,$liPlatform);
    }
    $dbcon=pg_close();
    return $arrayPlatform;

}

function modifyPlatform( $idPlatform, $namePlatform)
{
    $dbcon=initConnectionDb();
    $platformEdited =false;
    $query = pg_query($dbcon, "UPDATE platform set name='$$namePlatform' where id = '$idPlatform'");

    if($resultModify= $query)
    {
        $platformEdited = true;
    }
    $dbcon = pg_close();

    return $platformEdited;

}

function searchId($id)
{
    $query = "SELECT * FROM platform WHERE id=$id";
    $search = null;
    $dbcon = initConnectionDb();

    $rs = pg_query( $dbcon, $query );
    if( $query )
    {
        if( pg_num_rows($rs) > 0 )
            $search = pg_fetch_object( $rs, 0 );
    }
    return $search;
}

