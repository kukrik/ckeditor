// CKEditor Setup Functions

// Must be path to ckeditor relative to DOCROOT
var CKEDITOR_BASEPATH = qc.jsVendor + "/ckeditor/ckeditor/";

// Insert a custom startup function into qcubed to help us retrieve data during ajax calls.
qcubed.qckeditor = function (inst, formId, controlId, customReadyFunc) {
    // We need to do this on the qposting event because blur and change are delayed and fire after button events.
    $j('#' + formId).on('qposting', function() {
        if (inst.checkDirty()) { // provided by ckeditor
            // This works because the jquery adapter provides a .val() function, which is what qcubed.js uses
            // We could also call qcubed.setAdditionalPostVar here
            $j('#' + controlId).change();
        }
    });

    if (typeof customReadyFunc === 'function') {
        customReadyFunc.call(inst, formId, controlId);
    }
};
