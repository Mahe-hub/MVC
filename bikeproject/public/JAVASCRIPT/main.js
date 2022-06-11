const confirmDelete = () =>{
    return confirm("Delete this?");
// this will return true or false 
// if true it return true then we will go to delete method in users controler to delete else return false and  dont go to method and delete 

}

// define function do validation on create user form 
function validateUserForm(){

    //define vairable from form 
    // const Form =document.getElementById("create");
    // check if the name filed in form not null 
    if(document.getElementById("name").value ==""){ 
        alert("please enter a value");
    }
    // submit the form 
    else{
        document.getElementById("create").submit();
     
    }
} 