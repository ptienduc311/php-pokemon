<?php

function form_error($label_field) {
    global $error;
    if (!empty($error[$label_field]))
        return "<p class='error'>$error[$label_field]</p>";
}

function set_value($data){
    global $$data;
    if(!empty($$data)){
        return $$data;
    }
}