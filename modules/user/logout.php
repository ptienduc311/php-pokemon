<?php
unset($_SESSION['user_id']);
session_destroy();
redirect('?mod=login&act=index');

