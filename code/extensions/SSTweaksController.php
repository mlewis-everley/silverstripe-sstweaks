<?php
/**
 * Add additional methods to controller
 *
 * @author morven
 */
class SSTweaksController extends Extension {

    /**
     * Socialnav on SSTweaks is removed, in place of the social nav
     * module
     */
    public function SocialNav() {
        if(!class_exists("SocialNav"))
            Deprecation::notice('3.0', 'SSTweaks.Socialnav is discontinued, please install i-lateral/silverstripe-socialnav instead.');
        else
            return SocialNav::create();
    }

    /**
     * Set a flash message that will appear in your templates
     *
     * The site styling currently accepts the following message types
     *
     * - success: Rendered green
     * - error: Rendered red
     * - info: Rendered blue
     *
     * @param $type Type of message
     * @param $message message to send
     * @return Controller
     */
    public function setFlashMessage($type, $message) {
        Session::set('Site.Message', array(
            'Type' => $type,
            'Message' => $message
        ));

        return $this;
    }

    /**
     * Get a flash message that is rendered into a template
     *
     * @return String
     */
    public function getFlashMessage() {
        if($message = Session::get('Site.Message')){
            Session::clear('Site.Message');
            $array = new ArrayData($message);
            return $array->renderWith('FlashMessage');
        }
    }
}
