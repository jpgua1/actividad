<?php
function deletePlatformDef($idPlatform)
{
$dbcon=initConnectionDb();
$platformdelete = false;
$query = pg_query($dbcon, "DELETE FROM platform WHERE id = $idPlatform ");

if($resultDelete= $query)
{
$platformCdelete = true;
}
$dbcon = pg_close();

return $platformdelete;

}