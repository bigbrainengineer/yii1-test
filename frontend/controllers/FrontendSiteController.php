<?php
/**
 * Basic "kitchen sink" controller for frontend.
 * It was configured to be accessible by `/site` route, not the `/frontendSite` one!
 *
 * @package YiiBoilerplate\Frontend
 */
class FrontendSiteController extends FrontendController
{
	/**
     * Actions attached to this controller
     *
	 * @return array
	 */
	public function actions()
    {
		return array(
            'index' => array(
                'class' => 'LandingPageAction'
            ),
            'error' => array(
                'class' => 'SimpleErrorAction'
            )
		);
	}

    public function behaviors()
    {
        return array(
            'RBACAccessComponent'=>array(
                'class'=>'application.modules.rbac.components.RBACAccessVerifier',
                // optional default settings
                'checkDefaultIndex'=>'id', // used with buisness Rules if no Index given
                'allowCaching'=>false,  // cache RBAC Tree -- do not enable while development ;)
                'accessDeniedUrl'=>'/user/login',// used if User is logged in
                'loginUrl'=>'/user/login'// used if User is NOT logged in
            ),
        );
    }
}