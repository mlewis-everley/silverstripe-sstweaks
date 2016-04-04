<?php
/**
 * Add additional variables to default siteconfig
 *
 * @author morven
 */
class SSTweaksSiteTree extends DataExtension {
    public static $db = array(
        "SummaryContent"    => "Text"
    );

    public static $has_one = array(
        "SummaryImage"      => "Image"
    );

    function updateCMSFields(FieldList $fields) {
        $fields->removeByName("SummaryContent");
        $fields->removeByName("SummaryImage");

        $summary_fields = ToggleCompositeField::create('Summary', 'Summary Info.',
            array(
                TextareaField::create("SummaryContent", $this->owner->fieldLabel('SummaryContent')),
                UploadField::create("SummaryImage", $this->owner->fieldLabel('SummaryImage'))
            )
        )->setHeadingLevel(4);

        $fields->addFieldToTab('Root.Main', $summary_fields, 'Metadata');
    }
}

