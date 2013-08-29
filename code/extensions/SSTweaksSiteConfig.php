<?php
/**
 * Add additional variables to default siteconfig
 *
 * @author morven
 */
class SSTweaksSiteConfig extends DataExtension {
    public static $db = array(
        "FooterContent"     => "HTMLText",
        "FacebookURL"       => "Varchar(100)",
        "TwitterURL"        => "Varchar(100)",
        "LinkdInURL"        => "Varchar(100)",
        "YouTubeURL"        => "Varchar(100)",
        "ContactEmail"      => "Varchar(100)",
        "ContactPhone"      => "Varchar(50)",
        "ContactAddress"    => "Text",
        "MiscContactInfo"   => "HTMLText",
        "MapHTML"           => "HTMLText"
    );

    public static $has_one = array(
        'Logo'          => 'Image'
    );

    public function ContactAddressXML() {
        return (nl2br(Convert::raw2xml ($this->owner->ContactAddress), true));
    }

    public function MiscContactInfoXML() {
        return (nl2br(Convert::raw2xml ($this->owner->MiscContactInfo), true));
    }

    public function updateCMSFields(FieldList $fields) {
        $fields->addFieldToTab('Root.Main', UploadField::create('Logo')->setFolderName('logos'));


        $footer_fields = ToggleCompositeField::create('FoooterInfo', 'Footer',
            array(
                HTMLEditorField::create('FooterContent','Content to appear in footer')->setRows(15)->addExtraClass('stacked')
            )
        )->setHeadingLevel(4);

        $fields->addFieldToTab('Root.Main', $footer_fields);

        $contact_fields = ToggleCompositeField::create('ContactInfo', 'Contact Info.',
            array(
                TextAreaField::create('ContactAddress', $this->owner->fieldLabel('ContactAddress')),
                TextField::create('ContactEmail', $this->owner->fieldLabel('ContactEmail')),
                TextField::create('ContactPhone', $this->owner->fieldLabel('ContactPhone')),
                TextAreaField::create('MiscContactInfo', $this->owner->fieldLabel('MiscContactInfo')),
                TextAreaField::create('MapHTML', "HTML to be loaded for mapping info")
            )
        )->setHeadingLevel(4);

        $social_fields = ToggleCompositeField::create('SocialInfo', 'Social Info.',
            array(
                TextField::create('FacebookURL', $this->owner->fieldLabel('FacebookURL')),
                TextField::create('TwitterURL', $this->owner->fieldLabel('TwitterURL')),
                TextField::create('LinkdInURL', $this->owner->fieldLabel('LinkdInURL'))
                TextField::create('YouTubeURL', $this->owner->fieldLabel('YouTubeURL'))
            )
        )->setHeadingLevel(4);

        $fields->addFieldToTab('Root.Main', $contact_fields);
        $fields->addFieldToTab('Root.Main', $social_fields);
    }
}

