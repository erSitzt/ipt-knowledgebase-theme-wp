/**
 * Bootstrap 3 to 5 compatibility layer
 * This script helps maintain backward compatibility with Bootstrap 3 classes
 * by mapping them to their Bootstrap 5 equivalents
 */

(function($) {
    'use strict';
    
    // Map old classes to new ones
    const classMap = {
        // Layout
        'pull-left': 'float-start',
        'pull-right': 'float-end',
        'center-block': 'mx-auto d-block',
        'hidden': 'd-none',
        'hidden-xs': 'd-none d-sm-block',
        'hidden-sm': 'd-sm-none d-md-block',
        'hidden-md': 'd-md-none d-lg-block',
        'hidden-lg': 'd-lg-none d-xl-block',
        'visible-xs': 'd-block d-sm-none',
        'visible-sm': 'd-none d-sm-block d-md-none',
        'visible-md': 'd-none d-md-block d-lg-none',
        'visible-lg': 'd-none d-lg-block d-xl-none',
        
        // Typography
        'text-left': 'text-start',
        'text-right': 'text-end',
        
        // Buttons
        'btn-default': 'btn-light',
        'btn-xs': 'btn-sm',
        
        // Panels to Cards
        'panel': 'card',
        'panel-heading': 'card-header',
        'panel-title': 'card-title',
        'panel-body': 'card-body',
        'panel-footer': 'card-footer',
        'panel-primary': 'card bg-primary text-white',
        'panel-success': 'card bg-success text-white',
        'panel-info': 'card bg-info text-white',
        'panel-warning': 'card bg-warning',
        'panel-danger': 'card bg-danger text-white',
        
        // Wells to Cards
        'well': 'card card-body',
        'well-lg': 'card card-body p-5',
        'well-sm': 'card card-body p-2',
        
        // Misc
        'caret': 'dropdown-toggle',
        'help-block': 'form-text',
        'control-label': 'col-form-label',
        'input-sm': 'form-control-sm',
        'input-lg': 'form-control-lg'
    };

    // Add Bootstrap 5 classes to elements with Bootstrap 3 classes
    function addBootstrap5Classes() {
        Object.keys(classMap).forEach(function(oldClass) {
            const elements = document.querySelectorAll('.' + oldClass);
            elements.forEach(function(element) {
                element.classList.add(...classMap[oldClass].split(' '));
            });
        });
    }

    // Run on document ready
    $(document).ready(function() {
        addBootstrap5Classes();
        
        // Fix dropdowns
        $('.dropdown-toggle').attr('data-bs-toggle', 'dropdown');
        $('.collapse-toggle, [data-toggle="collapse"]').each(function() {
            const target = $(this).attr('data-target') || $(this).attr('href');
            $(this).attr('data-bs-toggle', 'collapse');
            $(this).attr('data-bs-target', target);
        });
        
        // Fix modals
        $('[data-toggle="modal"]').each(function() {
            const target = $(this).attr('data-target');
            $(this).attr('data-bs-toggle', 'modal');
            $(this).attr('data-bs-target', target);
        });
        
        // Fix tooltips
        $('.bstooltip, [data-toggle="tooltip"]').each(function() {
            $(this).attr('data-bs-toggle', 'tooltip');
            
            // Initialize new tooltips
            new bootstrap.Tooltip(this);
        });
        
        // Fix popovers
        $('[data-toggle="popover"]').each(function() {
            $(this).attr('data-bs-toggle', 'popover');
            
            // Initialize new popovers
            new bootstrap.Popover(this);
        });
        
        // Fix tabs
        $('[data-toggle="tab"]').each(function() {
            $(this).attr('data-bs-toggle', 'tab');
        });
    });

})(jQuery);
