
function showdiv($id) {
    var x = document.getElementById($id);
    var users = document.getElementById('users');
    var journal = document.getElementById('journals');
    var fb = document.getElementById('FB');

    if (x.classList.contains("d-none")) {
        x.classList.remove('d-none');
        x.classList.add('d-inline');
    }
    if (x == users) {
        journal.classList.remove('d-inline');
        journal.classList.add('d-none');
        fb.classList.remove('d-inline');
        fb.classList.add('d-none');
    }
    else if (x == journal) {
        users.classList.remove('d-inline');
        users.classList.add('d-none');
        fb.classList.remove('d-inline');
        fb.classList.add('d-none');
    }
    else if (x == fb){
        users.classList.remove('d-inline');
        users.classList.add('d-none');
        journal.classList.remove('d-inline');
        journal.classList.add('d-none');
    }
}

function showdiv2($id) {
    var x = document.getElementById($id);
    var themes = document.getElementById('themes');
    var categories = document.getElementById('categories');
    var articles = document.getElementById('articles');

    if (x.classList.contains("d-none")) {
        x.classList.remove('d-none');
        x.classList.add('d-inline');
    }
    if (x == themes) {
        categories.classList.remove('d-inline');
        categories.classList.add('d-none');
        articles.classList.remove('d-inline');
        articles.classList.add('d-none');
    }
    else if (x == categories) {
        themes.classList.remove('d-inline');
        themes.classList.add('d-none');
        articles.classList.remove('d-inline');
        articles.classList.add('d-none');
    }
    else if (x == articles){
        themes.classList.remove('d-inline');
        themes.classList.add('d-none');
        categories.classList.remove('d-inline');
        categories.classList.add('d-none');
    }
}
function showvalider($id){
    var v=document.getElementById("valider_user_"+$id);
    if(v.classList.contains('d-none')){
        v.classList.remove('d-none');
        v.classList.add('d-inline');
    }

    hideValiderIfNotChanged($id);
    ConfirmDelete();


}
function hideValiderIfNotChanged($id) {

    var nameInput = document.getElementById('name_user_input_'+$id);
    var emailInput = document.getElementById('email_user_input_'+$id);
    var roleInput = document.getElementById('role_user_select_'+$id);
    if(hasNotChanged(nameInput) && hasNotChanged(emailInput) && roleInput.selectedIndex === 0){
        var v= document.getElementById("valider_user_"+$id);
        if(!v.classList.contains('d-none'))
        v.classList.add('d-none');
        if(v.classList.contains('d-inline'))
            v.classList.remove('d-inline')
    }

}
function hasNotChanged($element) {

    return $element.defaultValue === $element.value;
}

function textToInput($nameId,$id){
    var i=document.getElementById($nameId+'_user_input_'+$id);
    document.getElementById($nameId+'_user_'+$id).classList.add('d-none');
    document.getElementById($nameId+'_user_input_'+$id).classList.remove('d-none');
    document.getElementById($nameId+'_user_input_'+$id).classList.add('d-inline');
    i.size = Math.max((i.value.length >= 5) ? i.value.length : 6, 1);
}
function textToselect($id ){
    var i=document.getElementById('role_user_select_'+$id);
    document.getElementById('role_user_'+$id).classList.add('d-none');
    document.getElementById('role_user_select_'+$id).classList.remove('d-none');
    document.getElementById('role_user_select_'+$id).classList.add('d-inline');

    //i.size = Math.max(i.value.length, 1);
}

function addToSelect($id,$role) {
    var x = document.getElementById($id).options.length;
    if(x<3){
        $role=String($role);

        if($role == 'admin'){

            addOption($id,'moderator');
            addOption($id,'user');
        }
        else if($role=='moderator'){

            addOption($id,'user');
            addOption($id,'admin');
        }
        else{

            addOption($id,'moderator');
            addOption($id,'admin');
        }
    }
}
function addOption($id,$text){
    var sel = document.getElementById($id);

    // create new option element
    var opt = document.createElement('option');

    // create text node to add to option element (opt)
    opt.appendChild( document.createTextNode($text) );

    // set value property of opt
    //opt.value = 'option value';

    // add opt to end of select box (sel)
    sel.appendChild(opt);
}
function AddNameAttribute($id) {
    document.getElementById('name_user_input_'+$id).name='name';
    document.getElementById('email_user_input_'+$id).name='email';
    document.getElementById('role_user_select_'+$id).name='role';
    document.getElementById('hidden_id_user_'+$id).name='id';
}
function ShowFromImage(){
    document.getElementById('999').scrollIntoView();
}
//show button
function ShowOnHover($id) {
    var x = document.getElementById('manager_btn_'+$id);

    x.classList.remove('d-none');
    x.classList.add('d-inline');
}
function Hide($id){
    var x = document.getElementById('manager_btn_'+$id);
    x.classList.remove('d-inline');
    x.classList.add('d-none');
}