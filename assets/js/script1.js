// JavaScript Document

// ------------Initialisation Ajax------------ 
	function getXhr(){
			var xhr = null;
			if(window.XMLHttpRequest) // Firefox And others
			xhr = new XMLHttpRequest();
			else if(window.ActiveXObject){ // Internet Explorer
			try {
			xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch (e) {
			xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
			}
			else { // XMLHttpRequest non supporté par le navigateur
			alert("Votre navigateur ne supporte pas les objets XMLHTTPRequest...");
			xhr = false;
			}
			return xhr;
		}
		
//--------------Fonctions de verification-----------------	
function verif_input(){
	var grp=document.getElementById("grp_fil").innerHTML;
	var niv=document.getElementById("niv").innerHTML;
	var opt=document.getElementById("option").innerHTML;
	var notify1="Il n'existe aucun groupe de filiere. Creer <a href="+'"gestion_bages_admin.php?page=gest_groupe"'+">ici</a>";
	var notify2="Il n'existe aucun niveau. Creer <a href="+'"gestion_bages_admin.php?page=gest_niveau"'+">ici</a>";
	var notify3="Il n'existe aucune option. Creer <a href="+'"gestion_bages_admin.php?page=gest_option"'+">ici</a>";
	if(grp==notify1||niv==notify2||opt==notify3)
	{ 
		document.getElementById("store_btn").disabled=true;
		document.getElementById("store_btn").style.cursor="wait";
	}
}

function Quit_form()
	{
		window.location="gestion_bages_admin.php";
		document.close();
	}
	
//------------Fonctions Ajax------------------------------

         function rm_eqpt(idSalesTrans)
	{
		var rsp=confirm("Do you really want to Remove this Equipment ?");
		if(rsp==true)
		{
			var xhr = getXhr();
			xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
			resp = xhr.responseText;
			alert(resp);
			}
			}
			xhr.open("POST","../../ModelE/my_ajax_svr.php",true);
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			idSalesTrans = idSalesTrans;
			xhr.send("RmvEqpt="+idSalesTrans);
                        
                        setInterval(function()
                            {
                                location.reload(true);
                            }, 50);
		}
		else
		{
			alert("confirm false");
		}
	}
        
        
         function act_eqpt(idEquipment)
	{
		var rsp=confirm("Do you really want to Activate this Equipment ?");
		if(rsp==true)
		{
			var xhr = getXhr();
			xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
			resp = xhr.responseText;
			alert(resp);
			}
			}
			xhr.open("POST","../../ModelE/my_ajax_svr.php",true);
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			idEquipment = idEquipment;
			xhr.send("ActEqpt="+idEquipment);
                        
                        setInterval(function()
                            {
                                location.reload(true);
                            }, 50);
		}
		else
		{
			alert("confirm false");
		}
	}
        
        
        
        function deact_eqpt(idEquipment)
	{
		var rsp=confirm("Do you really want to Dectivate this Equipment ?");
		if(rsp==true)
		{
			var xhr = getXhr();
			xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
			resp = xhr.responseText;
			alert(resp);
			}
			}
			xhr.open("POST","../../ModelE/my_ajax_svr.php",true);
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			idEquipment = idEquipment;
			xhr.send("DctEqpt="+idEquipment);
                        
                        setInterval(function()
                            {
                                location.reload(true);
                            }, 50);
		}
		else
		{
			alert("confirm false");
		}
	}

     
        function activate_User(idUsers)
	{
		var rsp=confirm("Do you really want to Activate this User ?");
		if(rsp==true)
		{
			var xhr = getXhr();
			xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
			resp = xhr.responseText;
			alert(resp);
			}
			}
			xhr.open("POST","../../ModelE/my_ajax_svr.php",true);
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			idUsers = idUsers;
			xhr.send("ActUrs="+idUsers);
                        
                        setInterval(function()
                            {
                                location.reload(true);
                            }, 50);
		}
		else
		{
			alert("confirm false");
		}
	}
        

        function deactivate_User(idUsers)
	{
		var rsp=confirm("Do you really want to Dectivate this User ?");
		if(rsp==true)
		{
			var xhr = getXhr();
			xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
			resp = xhr.responseText;
			alert(resp);
			}
			}
			xhr.open("POST","../../ModelE/my_ajax_svr.php",true);
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			idUsers = idUsers;
			xhr.send("DctUrs="+idUsers);
                        
                        setInterval(function()
                            {
                                location.reload(true);
                            }, 50);
		}
		else
		{
			alert("confirm false");
		}
	}
        
        
        
         function activate_Cate(idCategory)
	{
		var rsp=confirm("Do you really want to Activate this Category ?");
		if(rsp==true)
		{
			var xhr = getXhr();
			xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
			resp = xhr.responseText;
			alert(resp);
			}
			}
			xhr.open("POST","../../ModelE/my_ajax_svr.php",true);
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			idCategory = idCategory;
			xhr.send("ActCat="+idCategory);
                        
                        setInterval(function()
                            {
                                location.reload(true);
                            }, 50);
		}
		else
		{
			alert("confirm false");
		}
	}
        
         function deactivate_Cate(idCategory)
	{
		var rsp=confirm("Do you really want to Deactivate this Category ?");
		if(rsp==true)
		{
			var xhr = getXhr();
			xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
			resp = xhr.responseText;
			alert(resp);
			}
			}
			xhr.open("POST","../../ModelE/my_ajax_svr.php",true);
			xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
			idCategory = idCategory;
			xhr.send("DctCat="+idCategory);
                        
                        setInterval(function()
                            {
                                location.reload(true);
                            }, 50);
		}
		else
		{
			alert("confirm false");
		}
	}
        
        
        
  