<?php
/**
 * Add additional variables to default siteconfig
 *
 * @author morven
 */
class SSTweaksSiteConfig extends DataExtension {
    
    static $db = array(
        "FooterContent"         => "HTMLText",
        "MapHTML"               => "HTMLText",
    );

    static $has_one = array(
        'Logo'          => 'Image'
    );
    
    static $casting = array(
        "ContactEmail"          => "Varchar(100)",
        "ContactPhone"          => "Varchar(50)",
        "ContactAddress"        => "Text",
        "MiscContactInfo"       => "Text"
    );
    
    public function ContactEmail() {
        Deprecation::notice('3.0', 'SSTweaks.ContactEmail is discontinued, please Add this yourself it you need it.');
    }
    
    public function ContactPhone() {
        Deprecation::notice('3.0', 'SSTweaks.ContactPhone is discontinued, please Add this yourself it you need it.');
    }
    
    public function ContactAddress() {
        Deprecation::notice('3.0', 'SSTweaks.ContactAddress is discontinued, please Add this yourself it you need it.');
    }
    
    public function MiscContactInfo() {
        Deprecation::notice('3.0', 'SSTweaks.MiscContactInfo is discontinued, please Add this yourself it you need it.');
    }
    
    public function MapHTML() {
        Deprecation::notice('3.0', 'SSTweaks.MapHTML is discontinued, please Add this yourself it you need it.');
    }

    public function ContactAddressXML() {
        return (nl2br(Convert::raw2xml ($this->owner->ContactAddress), true));
    }

    public function MiscContactInfoXML() {
        return (nl2br(Convert::raw2xml ($this->owner->MiscContactInfo), true));
    }

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab('Root.Main', UploadField::create('Logo')->setFolderName('logos'));


        $footer_fields = ToggleCompositeField::create('FooterInfo', 'Footer',
            array(
                HTMLEditorField::create('FooterContent','Content to appear in footer')->setRows(15)->addExtraClass('stacked')
            )
        )->setHeadingLevel(4);

        $fields->addFieldToTab('Root.Main', $footer_fields);
        $fields->addFieldToTab('Root.Main', $contact_fields);
    }
}

