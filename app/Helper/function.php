<?php
function searchinarray($wrong,$correct,$id)
{
foreach ($wrong as $key => $value) {
    if($id==$key)
    {
      return $value;
    }
}
foreach ($correct as $key => $value) {
    if($id==$key)
    {
      return $value;
    }
}
}
function check($i,$wrong,$correct,$id,$correctanswer)
{
if ($i==searchinarray($wrong,$correct,$id) && $correctanswer== searchinarray($wrong,$correct,$id)) {
   return  "checked style=background:green";
}
if ($i==searchinarray($wrong,$correct,$id) && $correctanswer!= searchinarray($wrong,$correct,$id)) {
    return "checked style=background:red";
 }
 if ($i==$correctanswer) {
    return "style=background:green";
 }

}
function sorteimage($despath,$req_file_img){
  $destinationPath =$despath;
  $files = $req_file_img;
  $file_name =time() . $files->getClientOriginalName();
  $files->move($destinationPath, $file_name);
  return $file_name;
}
