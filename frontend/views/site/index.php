<?php
$user = Yii::app()->user; // just a convenience to shorten expressions
$this->widget('zii.widgets.CMenu',array(
    'items'=>array(             
        array('label'=>'Users', 'url'=>array('/manageUser/admin'), 'visible'=>$user->checkAccess('staff')),
        array('label'=>'Your Ideas', 'url'=>array('/userarea/ideaList'), 'visible'=>$user->checkAccess('normal')),
        array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>$user->isGuest),
        array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!$user->isGuest)
    ),
));
?>