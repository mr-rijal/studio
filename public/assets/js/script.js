(function () {
    "use strict";

	// Variables declarations
	var $wrapper = $('.main-wrapper');
	var $pageWrapper = $('.page-wrapper');

	// Mobile menu sidebar overlay
	$('body').append('<div class="sidebar-overlay"></div>');

	$(document).on('click', '#mobile_btn', function() {
		$wrapper.toggleClass('slide-nav');
		$('.sidebar-overlay').toggleClass('opened');
		$('html').addClass('menu-opened');
		return false;
	});
	$(".sidebar-close").on("click", function () {
		$wrapper.removeClass('slide-nav');
		$('.sidebar-overlay').removeClass('opened');
		$('html').removeClass('menu-opened');
	});

	$(".sidebar-overlay").on("click", function () {
		$('html').removeClass('menu-opened');
		$(this).removeClass('opened');
		$wrapper.removeClass('slide-nav');
		$('.sidebar-overlay').removeClass('opened');
	});

	// Sidebar
	var Sidemenu = function() {
		this.$menuItem = $('.sidebar-menu a');
	};

	function init() {
		var $this = Sidemenu;
		$('.sidebar-menu a').on('click', function(e) {
			if($(this).parent().hasClass('submenu')) {
				e.preventDefault();
			}
			if(!$(this).hasClass('subdrop')) {
				$('ul', $(this).parents('ul:first')).slideUp(250);
				$('a', $(this).parents('ul:first')).removeClass('subdrop');
				$(this).next('ul').slideDown(350);
				$(this).addClass('subdrop');
			} else if($(this).hasClass('subdrop')) {
				$(this).removeClass('subdrop');
				$(this).next('ul').slideUp(350);
			}
		});
		$('.sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
	}

	// Sidebar Initiate
	init();
	$(document).on('mouseover', function(e) {
        e.stopPropagation();
        if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
            var targ = $(e.target).closest('.sidebar, .header-left').length;
            if (targ) {
               $('body').addClass('expand-menu');
                $('.subdrop + ul').slideDown();
            } else {
               $('body').removeClass('expand-menu');
                $('.subdrop + ul').slideUp();
            }
            return false;
        }
    });

	// star filled
	$(document).ready(function() {
    setTimeout(function() {
        $(".rating-select").on('click', function() {
            $(this).toggleClass("filled");
        });
    }, 100);
});


	//   editor
   	if($('.editor').length > 0) {
        document.querySelectorAll('.editor').forEach((editor) => {
            new Quill(editor, {
              theme: 'snow'
            });
        });
    }



		if ($('.multiple-img').length > 0) {
		function formatState (state) {
		  if (!state.id) { return state.text; }
		  var $state = $(
		    '<span><img src="' + $(state.element).attr('data-image') + '" class="img-flag" / " width="16px"> ' + state.text + '</span>'
		  );
		  return $state;
		};
		$('.multiple-img').select2({
			minimumResultsForSearch: Infinity,
		  	templateResult: formatState,
		  	templateSelection: formatState
		});
	}


	// collapes header
	if($('#collapse-header').length > 0) {
		document.getElementById('collapse-header').onclick = function() {
		    this.classList.toggle('active');
		    document.body.classList.toggle('header-collapse');
		}
	}

	// Toggle Button
	$(document).on('click', '#toggle_btn', function () {
		const $body = $('body');
		const $html = $('html');
		const isMini = $body.hasClass('mini-sidebar');
		const isFullWidth = $html.attr('data-layout') === 'full-width';
		const isHidden = $html.attr('data-layout') === 'hidden';

		if (isMini) {
			$body.removeClass('mini-sidebar');
			$(this).addClass('active');
			localStorage.setItem('screenModeNightTokenState', 'night');
			setTimeout(function () {
				$(".header-left").addClass("active");
			}, 100);
		} else {
			$body.addClass('mini-sidebar');
			$(this).removeClass('active');
			localStorage.removeItem('screenModeNightTokenState');
			setTimeout(function () {
				$(".header-left").removeClass("active");
			}, 100);
		}

		// If <html> has data-layout="full-width", apply full-width class to <body>
		if (isFullWidth) {
			$body.addClass('full-width').removeClass('mini-sidebar');
			$('.sidebar-overlay').addClass('opened');
			$(document).on('click', '.sidebar-close', function () {
				$('body').removeClass('full-width');
			});
		} else {
			$body.removeClass('full-width');
		}

		// If <html> has data-layout="hidden", apply hidden-layout class to <body>
		if (isHidden) {
			$body.toggleClass('hidden-layout');
			$body.removeClass('mini-sidebar');
			$(document).on('click', '.sidebar-close', function () {
				$('body').removeClass('full-width');
			});
		}

		return false;
	});


		// close filter btn
		document.addEventListener('DOMContentLoaded', function () {
		document.querySelectorAll('.close-filter-btn').forEach(function (btn) {
		btn.addEventListener('click', function () {
			// Find the closest parent with .dropdown
			const dropdown = btn.closest('.dropdown');
			const toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');

			// Use Bootstrap's Dropdown API to hide
			const dropdownInstance = bootstrap.Dropdown.getInstance(toggle) || new bootstrap.Dropdown(toggle);
			dropdownInstance.hide();
		});
		});
		});

	// Tooltip
	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
	const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

	// Input Mask
	document.querySelectorAll('[data-toggle="input-mask"]').forEach(input => {
		const format = input.getAttribute('data-mask-format');
		const reverse = input.getAttribute('data-reverse') === 'true';

		if (format && typeof Inputmask !== 'undefined') {
			Inputmask({
				mask: format.replace(/0/g, '9'),
				reverse: reverse
			}).mask(input);
		}
	});

	// Form Validation
	document.querySelectorAll('.needs-validation').forEach(form => {
		form.addEventListener('submit', event => {
			if (!form.checkValidity()) {
				event.preventDefault();
				event.stopPropagation();
			}

			form.classList.add('was-validated');
		}, false);
	});

	// Choices
	function initChoices() {
		document.querySelectorAll('[data-choices]').forEach(item => {
			const config = {
				allowHTML: true
			};
			const attrs = item.attributes;

			if (attrs['data-choices-groups']) {
				config.placeholderValue = 'This is a placeholder set in the config';
			}
			if (attrs['data-choices-search-false']) {
				config.searchEnabled = false;
			}
			if (attrs['data-choices-search-true']) {
				config.searchEnabled = true;
			}
			if (attrs['data-choices-removeItem']) {
				config.removeItemButton = true;
			}
			if (attrs['data-choices-sorting-false']) {
				config.shouldSort = false;
			}
			if (attrs['data-choices-sorting-true']) {
				config.shouldSort = true;
			}
			if (attrs['data-choices-multiple-remove']) {
				config.removeItemButton = true;
			}
			if (attrs['data-choices-limit']) {
				config.maxItemCount = parseInt(attrs['data-choices-limit'].value);
			}
			if (attrs['data-choices-editItem-true']) {
				config.editItems = true;
			}
			if (attrs['data-choices-editItem-false']) {
				config.editItems = false;
			}
			if (attrs['data-choices-text-unique-true']) {
				config.duplicateItemsAllowed = false;
			}
			if (attrs['data-choices-text-disabled-true']) {
				config.addItems = false;
			}

			const instance = new Choices(item, config);

			if (attrs['data-choices-text-disabled-true']) {
				instance.disable();
			}
		});
	}

	// Call it when the DOM is ready
	document.addEventListener('DOMContentLoaded', initChoices);

	// Initialize Flatpickr on elements with data-provider="flatpickr"
	document.querySelectorAll('[data-provider="flatpickr"]').forEach(el => {
		const config = {
			disableMobile: true
		};

		if (el.hasAttribute('data-date-format')) {
			config.dateFormat = el.getAttribute('data-date-format');
		}

		if (el.hasAttribute('data-enable-time')) {
			config.enableTime = true;
			config.dateFormat = config.dateFormat ? `${config.dateFormat} H:i` : 'Y-m-d H:i';
		}

		if (el.hasAttribute('data-altFormat')) {
			config.altInput = true;
			config.altFormat = el.getAttribute('data-altFormat');
		}

		if (el.hasAttribute('data-minDate')) {
			config.minDate = el.getAttribute('data-minDate');
		}

		if (el.hasAttribute('data-maxDate')) {
			config.maxDate = el.getAttribute('data-maxDate');
		}

		if (el.hasAttribute('data-default-date')) {
			config.defaultDate = el.getAttribute('data-default-date');
		}

		if (el.hasAttribute('data-multiple-date')) {
			config.mode = 'multiple';
		}

		if (el.hasAttribute('data-range-date')) {
			config.mode = 'range';
		}

		if (el.hasAttribute('data-inline-date')) {
			config.inline = true;
			config.defaultDate = el.getAttribute('data-inline-date');
		}

		if (el.hasAttribute('data-disable-date')) {
			config.disable = el.getAttribute('data-disable-date').split(',');
		}

		if (el.hasAttribute('data-week-number')) {
			config.weekNumbers = true;
		}

		flatpickr(el, config);
	});

	// Time Picker
	document.querySelectorAll('[data-provider="timepickr"]').forEach(item => {
		const attrs = item.attributes;
		const config = {
			enableTime: true,
			noCalendar: true,
			dateFormat: "H:i"
		};

		if (attrs["data-time-hrs"]) {
			config.time_24hr = true;
		}

		if (attrs["data-min-time"]) {
			config.minTime = attrs["data-min-time"].value;
		}

		if (attrs["data-max-time"]) {
			config.maxTime = attrs["data-max-time"].value;
		}

		if (attrs["data-default-time"]) {
			config.defaultDate = attrs["data-default-time"].value;
		}

		if (attrs["data-time-inline"]) {
			config.inline = true;
			config.defaultDate = attrs["data-time-inline"].value;
		}

		flatpickr(item, config);
	});


	// Select2
	if (jQuery().select2) {
		$('[data-toggle="select2"]').each(function () {
			const $el = $(this);
			const options = {};

			// Placeholder
			if ($el.attr('data-placeholder')) {
				options.placeholder = $el.attr('data-placeholder');
			}

			// Allow clear
			if ($el.attr('data-allow-clear') === 'true') {
				options.allowClear = true;
			}

			// Tags input (user can enter new values)
			if ($el.attr('data-tags') === 'true') {
				options.tags = true;
			}

			// Maximum selection
			if ($el.attr('data-max-selections')) {
				options.maximumSelectionLength = parseInt($el.attr('data-max-selections'));
			}

			// AJAX (for dynamic search)
			if ($el.attr('data-ajax--url')) {
				options.ajax = {
					url: $el.attr('data-ajax--url'),
					dataType: 'json',
					delay: 250,
					data: function (params) {
						return {
							q: params.term, // search term
							page: params.page || 1
						};
					},
					processResults: function (data, params) {
						params.page = params.page || 1;
						return {
							results: data.items || [],
							pagination: {
								more: data.more
							}
						};
					},
					cache: true
				};
			}

			// Init Select2 with options
			$el.select2(options);
		});
	}

	// Select 2
    if ($('.select').length > 0) {
        $('.select').select2({
            minimumResultsForSearch: -1,
            width: '100%'
        });
    }

	const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
	const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

	//Toasts
	var toastPlacement = document.getElementById("toastPlacement");
	if (toastPlacement) {
		document.getElementById("selectToastPlacement").addEventListener("change", function () {
			if (!toastPlacement.dataset.originalClass) {
				toastPlacement.dataset.originalClass = toastPlacement.className;
			}
			toastPlacement.className = toastPlacement.dataset.originalClass + " " + this.value;
		});
	}

	// Datatable
	if($('.datatable').length > 0) {
		$('.datatable').DataTable({
			"bFilter": true,
			"sDom": 'fBtlpi',
			"ordering": true,
			"language": {
				search: ' ',
				sLengthMenu: '_MENU_',
				searchPlaceholder: "Search",
				sLengthMenu: 'Row Per Page _MENU_ Entries',
				info: "_START_ - _END_ of _TOTAL_ items",
				paginate: {
					next: '<i class="ti ti-arrow-right"></i>',
					previous: '<i class="ti ti-arrow-left"></i> '
				},
			},
			// "scrollX": true,         // Enable horizontal scrolling
			// "scrollCollapse": true,  // Adjust table size when the scroll is used
			"responsive": true,
			"autoWidth": false,
			initComplete: (settings, json)=>{
				$('.dataTables_filter').appendTo('#tableSearch');
				$('.dataTables_filter').appendTo('.search-input');
			},
		});
	}

	document.addEventListener("DOMContentLoaded", function () {
		if (document.querySelector('#filter-dropdown')) {
			const closeBtn = document.getElementById("close-filter");
			const filterDropdown = document.getElementById("filter-dropdown");

			if (closeBtn && filterDropdown) {
				closeBtn.addEventListener("click", function () {
					filterDropdown.classList.remove("show");
				});
			}
		}
	});

// wizard
		$(".wizard-field .wizard-next-btn").on('click', function () {
		$(this).closest('fieldset').next().fadeIn('slow');
		$(this).closest('fieldset').css({
			'display': 'none'
		});

		$('.progress-wizard .active').removeClass('active').addClass('activated').next().addClass('active');
	});


	let Tab1 ="#v-pills-info"
	let Tab2 ="#v-pills-vituals"
	let Tab3 = '#v-pills-medical-history';
	let Tab4 ="#v-pills-complaints"

	if($('.patient-add').length > 0) {
		document.getElementById('backButton').addEventListener('click', function() {
			$(Tab3).addClass('active');
			$(Tab4).removeClass('active');
			$("#v-pills-medical-history-tab").addClass('active').removeClass('activated')
			$("#v-pills-complaints-tab").removeClass('active')
		});
		document.getElementById('save-basic-info').addEventListener('click', function() {
			$(Tab2).addClass('active');
			$(Tab1).removeClass('active');
			$("#v-pills-vituals-tab").addClass('active');
			$("#v-pills-info-tab").removeClass('active').addClass('activated');
		});

		document.getElementById('save-vitals').addEventListener('click', function() {
			$(Tab3).addClass('active');
			$(Tab2).removeClass('active');
			$("#v-pills-medical-history-tab").addClass('active');
			$("#v-pills-vituals-tab").removeClass('active').addClass('activated');
		});

		document.getElementById('save-medical-history').addEventListener('click', function() {
			$(Tab4).addClass('active');
			$(Tab3).removeClass('active');
			$("#v-pills-complaints-tab").addClass('active');
			$("#v-pills-medical-history-tab").removeClass('active').addClass('activated');
		});
	}

	$(".tab-links li").on('click', function() {
	    $(this).addClass("active").siblings().removeClass('active');
	});


	// wizard 2
		$(".wizard-field .wizard-next-btn").on('click', function () {
		$(this).closest('fieldset').next().fadeIn('slow');
		$(this).closest('fieldset').css({
			'display': 'none'
		});

		$('.progress-wizard .active').removeClass('active').addClass('activated').next().addClass('active');
	});


	let Tab5 ="#v-pills-info"
	let Tab6 ="#v-pills-vituals"
	let Tab7 ="#v-pills-complaints"

	if($('.doctor-add').length > 0) {
		document.getElementById('backButton').addEventListener('click', function() {
			$(Tab6).addClass('active');
			$(Tab7).removeClass('active');
			$("#v-pills-vituals-tab").addClass('active').removeClass('activated')
			$("#v-pills-complaints-tab").removeClass('active')
		});
		document.getElementById('save-basic-info').addEventListener('click', function() {
			$(Tab6).addClass('active');
			$(Tab5).removeClass('active');
			$("#v-pills-vituals-tab").addClass('active');
			$("#v-pills-info-tab").removeClass('active').addClass('activated');
		});

		document.getElementById('save-vitals').addEventListener('click', function() {
			$(Tab7).addClass('active');
			$(Tab6).removeClass('active');
			$("#v-pills-complaints-tab").addClass('active');
			$("#v-pills-vituals-tab").removeClass('active').addClass('activated');
		});
	}

	// Staff wizard
	if (document.getElementById('staff-page')) {
		let Tab8 = "#staff-tab-Content-one";
		let Tab9 = "#staff-tab-Content-two";

		document.getElementById('save-staff-info').addEventListener('click', function () {
			$(Tab8).removeClass('active');
			$(Tab9).addClass('active');

			$("#staff-tab-one").removeClass('active').addClass('activated');
			$("#staff-tab-two").addClass('active');
		});

		document.getElementById('backButton').addEventListener('click', function () {
			$(Tab9).removeClass('active');
			$(Tab8).addClass('active');

			$("#staff-tab-two").removeClass('active');
			$("#staff-tab-one").addClass('active');
		});

		$("#staff-tab-one").on('click', function () {
			$(Tab9).removeClass('active');
			$(Tab8).addClass('active');

			$("#staff-tab-two").removeClass('active');
			$(this).addClass('active');
		});

		$("#staff-tab-two").on('click', function () {
			$(Tab8).removeClass('active');
			$(Tab9).addClass('active');

			$("#staff-tab-one").removeClass('active').addClass('activated');
			$(this).addClass('active');
		});


		let Tab10 = "#staff-tab-Content-one-1";
		let Tab11 = "#staff-tab-Content-two-1";

		document.getElementById('save-staff-info-1').addEventListener('click', function () {
			$(Tab10).removeClass('active');
			$(Tab11).addClass('active');

			$("#staff-tab-one-1").removeClass('active').addClass('activated');
			$("#staff-tab-two-1").addClass('active');
		});

		document.getElementById('backButton-1').addEventListener('click', function () {
			$(Tab11).removeClass('active');
			$(Tab10).addClass('active');

			$("#staff-tab-two-1").removeClass('active');
			$("#staff-tab-one-1").addClass('active');
		});

		$("#staff-tab-one-1").on('click', function () {
			$(Tab11).removeClass('active');
			$(Tab10).addClass('active');

			$("#staff-tab-two-1").removeClass('active');
			$(this).addClass('active');
		});

		$("#staff-tab-two-1").on('click', function () {
			$(Tab10).removeClass('active');
			$(Tab11).addClass('active');

			$("#staff-tab-one-1").removeClass('active').addClass('activated');
			$(this).addClass('active');
		});
	}


	$(".tab-links li").on('click', function() {
	    $(this).addClass("active").siblings().removeClass('active');
	});


	// add education

	$(".add-education-details").on('click', function () {

		var servicecontent = `
		<div class="row diagnosis_details">
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Institute Name<span class="text-danger ms-1">*</span></label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Qualification<span class="text-danger ms-1">*</span></label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-xl-4 col-md-6 d-flex align-items-end">
				<div class="mb-3 w-100">
					<label class="form-label">Year<span class="text-danger ms-1">*</span></label>
					<div class="input-group w-auto input-group-flat">
						<input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y">
						<span class="input-group-text">
							<i class="ti ti-calendar"></i>
						</span>
					</div>
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		setTimeout(function () {
            document.querySelectorAll('[data-provider="flatpickr"]').forEach(el => {
				const config = {
					disableMobile: true
				};

				if (el.hasAttribute('data-date-format')) {
					config.dateFormat = el.getAttribute('data-date-format');
				}

				if (el.hasAttribute('data-enable-time')) {
					config.enableTime = true;
					config.dateFormat = config.dateFormat ? `${config.dateFormat} H:i` : 'Y-m-d H:i';
				}

				if (el.hasAttribute('data-altFormat')) {
					config.altInput = true;
					config.altFormat = el.getAttribute('data-altFormat');
				}

				if (el.hasAttribute('data-minDate')) {
					config.minDate = el.getAttribute('data-minDate');
				}

				if (el.hasAttribute('data-maxDate')) {
					config.maxDate = el.getAttribute('data-maxDate');
				}

				if (el.hasAttribute('data-default-date')) {
					config.defaultDate = el.getAttribute('data-default-date');
				}

				if (el.hasAttribute('data-multiple-date')) {
					config.mode = 'multiple';
				}

				if (el.hasAttribute('data-range-date')) {
					config.mode = 'range';
				}

				if (el.hasAttribute('data-inline-date')) {
					config.inline = true;
					config.defaultDate = el.getAttribute('data-inline-date');
				}

				if (el.hasAttribute('data-disable-date')) {
					config.disable = el.getAttribute('data-disable-date').split(',');
				}

				if (el.hasAttribute('data-week-number')) {
					config.weekNumbers = true;
				}

				flatpickr(el, config);
			});
        }, 100);

		$(".diagnosis-info").append(servicecontent);
		return false;
	});

	$(".diagnosis-info").on('click','.trash-icon', function () {
		$(this).closest('.diagnosis_details').remove();
		return false;
    });

	// add exp
	$(".add-experience").on('click', function () {

		var servicecontent = `
		<div class="row experience_details">
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Hospital Name<span class="text-danger ms-1">*</span></label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">No of Years<span class="text-danger ms-1">*</span></label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-xl-4 col-md-6 d-flex align-items-end">
				<div class="mb-3 w-100">
					<label class="form-label">Year<span class="text-danger ms-1">*</span></label>
					<div class="input-group w-auto input-group-flat">
						<input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y">
						<span class="input-group-text">
							<i class="ti ti-calendar"></i>
						</span>
					</div>
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		setTimeout(function () {
	document.querySelectorAll('[data-provider="flatpickr"]').forEach(el => {
		const config = {
			disableMobile: true
		};

		if (el.hasAttribute('data-date-format')) {
			config.dateFormat = el.getAttribute('data-date-format');
		}

		if (el.hasAttribute('data-enable-time')) {
			config.enableTime = true;
			config.dateFormat = config.dateFormat ? `${config.dateFormat} H:i` : 'Y-m-d H:i';
		}

		if (el.hasAttribute('data-altFormat')) {
			config.altInput = true;
			config.altFormat = el.getAttribute('data-altFormat');
		}

		if (el.hasAttribute('data-minDate')) {
			config.minDate = el.getAttribute('data-minDate');
		}

		if (el.hasAttribute('data-maxDate')) {
			config.maxDate = el.getAttribute('data-maxDate');
		}

		if (el.hasAttribute('data-default-date')) {
			config.defaultDate = el.getAttribute('data-default-date');
		}

		if (el.hasAttribute('data-multiple-date')) {
			config.mode = 'multiple';
		}

		if (el.hasAttribute('data-range-date')) {
			config.mode = 'range';
		}

		if (el.hasAttribute('data-inline-date')) {
			config.inline = true;
			config.defaultDate = el.getAttribute('data-inline-date');
		}

		if (el.hasAttribute('data-disable-date')) {
			config.disable = el.getAttribute('data-disable-date').split(',');
		}

		if (el.hasAttribute('data-week-number')) {
			config.weekNumbers = true;
		}

		flatpickr(el, config);
	});
}, 100);

		$(".experience-info").append(servicecontent);
		return false;
	});

	$(".experience-info").on('click','.trash-icon', function () {
		$(this).closest('.experience_details').remove();
		return false;
    });

	// add membership
		$(".add-membership").on('click', function () {

		var servicecontent = `
		<div class="row membership_details">
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Title<span class="text-danger ms-1">*</span></label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Year<span class="text-danger ms-1">*</span></label>
					<div class="input-group w-auto input-group-flat">
						<input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y">
						<span class="input-group-text">
							<i class="ti ti-calendar"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 d-flex align-items-end">
				<div class="mb-3 w-100">
					<label class="form-label">Description<span class="text-danger ms-1">*</span></label>
					<input type="text" class="form-control">
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		setTimeout(function () {
	document.querySelectorAll('[data-provider="flatpickr"]').forEach(el => {
		const config = {
			disableMobile: true
		};

		if (el.hasAttribute('data-date-format')) {
			config.dateFormat = el.getAttribute('data-date-format');
		}

		if (el.hasAttribute('data-enable-time')) {
			config.enableTime = true;
			config.dateFormat = config.dateFormat ? `${config.dateFormat} H:i` : 'Y-m-d H:i';
		}

		if (el.hasAttribute('data-altFormat')) {
			config.altInput = true;
			config.altFormat = el.getAttribute('data-altFormat');
		}

		if (el.hasAttribute('data-minDate')) {
			config.minDate = el.getAttribute('data-minDate');
		}

		if (el.hasAttribute('data-maxDate')) {
			config.maxDate = el.getAttribute('data-maxDate');
		}

		if (el.hasAttribute('data-default-date')) {
			config.defaultDate = el.getAttribute('data-default-date');
		}

		if (el.hasAttribute('data-multiple-date')) {
			config.mode = 'multiple';
		}

		if (el.hasAttribute('data-range-date')) {
			config.mode = 'range';
		}

		if (el.hasAttribute('data-inline-date')) {
			config.inline = true;
			config.defaultDate = el.getAttribute('data-inline-date');
		}

		if (el.hasAttribute('data-disable-date')) {
			config.disable = el.getAttribute('data-disable-date').split(',');
		}

		if (el.hasAttribute('data-week-number')) {
			config.weekNumbers = true;
		}

		flatpickr(el, config);
	});
}, 100);

		$(".membership-info").append(servicecontent);
		return false;
	});

	$(".membership-info").on('click','.trash-icon', function () {
		$(this).closest('.membership_details').remove();
		return false;
    });

	// add awards
		$(".add-awards").on('click', function () {

		var servicecontent = `
		<div class="row awards_details">
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Award Name<span class="text-danger ms-1">*</span></label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Year<span class="text-danger ms-1">*</span></label>
					<div class="input-group w-auto input-group-flat">
						<input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y">
						<span class="input-group-text">
							<i class="ti ti-calendar"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 d-flex align-items-end">
				<div class="mb-3 w-100">
					<label class="form-label">Description<span class="text-danger ms-1">*</span></label>
					<input type="text" class="form-control">
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		setTimeout(function () {
	document.querySelectorAll('[data-provider="flatpickr"]').forEach(el => {
		const config = {
			disableMobile: true
		};

		if (el.hasAttribute('data-date-format')) {
			config.dateFormat = el.getAttribute('data-date-format');
		}

		if (el.hasAttribute('data-enable-time')) {
			config.enableTime = true;
			config.dateFormat = config.dateFormat ? `${config.dateFormat} H:i` : 'Y-m-d H:i';
		}

		if (el.hasAttribute('data-altFormat')) {
			config.altInput = true;
			config.altFormat = el.getAttribute('data-altFormat');
		}

		if (el.hasAttribute('data-minDate')) {
			config.minDate = el.getAttribute('data-minDate');
		}

		if (el.hasAttribute('data-maxDate')) {
			config.maxDate = el.getAttribute('data-maxDate');
		}

		if (el.hasAttribute('data-default-date')) {
			config.defaultDate = el.getAttribute('data-default-date');
		}

		if (el.hasAttribute('data-multiple-date')) {
			config.mode = 'multiple';
		}

		if (el.hasAttribute('data-range-date')) {
			config.mode = 'range';
		}

		if (el.hasAttribute('data-inline-date')) {
			config.inline = true;
			config.defaultDate = el.getAttribute('data-inline-date');
		}

		if (el.hasAttribute('data-disable-date')) {
			config.disable = el.getAttribute('data-disable-date').split(',');
		}

		if (el.hasAttribute('data-week-number')) {
			config.weekNumbers = true;
		}

		flatpickr(el, config);
	});
}, 100);

		$(".awards-info").append(servicecontent);
		return false;
	});

	$(".awards-info").on('click','.trash-icon', function () {
		$(this).closest('.awards_details').remove();
		return false;
    });


	// add medicine
		$(".add-medicine").on('click', function () {

		var servicecontent = `
		<div class="row medicine_details">
			<div class="col-xl-2 col-md-4 col-sm-6">
				<div class="mb-3">
					<label class="form-label">Medicine Name<span class="text-danger ms-1">*</span></label>
					<input class="form-control">
				</div>
			</div>
			<div class="col-xl-2 col-md-4 col-sm-6">
				<div class="mb-3">
					<label class="form-label">Dosage<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">mg</span>
					</div>
				</div>
			</div>
			<div class="col-xl-2 col-md-4 col-sm-6">
				<div class="mb-3">
					<label class="form-label">Duration<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">M</span>
					</div>
				</div>
			</div>
			<div class="col-xl-2 col-md-4 col-sm-6">
				<div class="mb-3">
					<label class="form-label">Frequency<span class="text-danger ms-1">*</span></label>
					<select class="select">
						<option>Select</option>
						<option>1-0-1</option>
						<option>1-0-0</option>
						<option>0-0-1</option>
					</select>
				</div>
			</div>
			<div class="col-xl-2 col-md-4 col-sm-6">
				<div class="mb-3">
					<label class="form-label">Timing<span class="text-danger ms-1">*</span></label>
					<select class="select">
						<option>Select</option>
						<option>Before Meal</option>
						<option>After Meal</option>
					</select>
				</div>
			</div>
			<div class="col-xl-2 col-md-4 col-sm-6 d-flex align-items-end">
				<div class="mb-3 w-100">
					<label class="form-label">Instructions<span class="text-danger ms-1">*</span></label>
					<input class="form-control">
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		setTimeout(function () {
            $('.select');
            setTimeout(function () {
                $('.select').select2({
                    minimumResultsForSearch: -1,
                    width: '100%'
                });
            }, 100);
        }, 100);

		$(".medicine-info").append(servicecontent);
		return false;
	});

	$(".medicine-info").on('click','.trash-icon', function () {
		$(this).closest('.medicine_details').remove();
		return false;
    });

	// add diagnosis two
	$(".add-diagnosis-two").on('click', function () {

		var servicecontent = `
		<div class="row diagnosis-two_details align-items-center">
			<div class="col-md-2">
				<div class="mb-md-3">
					<label class="form-label mb-md-0">Fever</label>
				</div>
			</div>
			<div class="col-md-5">
				<div class="mb-3">
					<select class="select">
						<option>Diagonosis Type</option>
						<option>Hectic</option>
						<option>Continuous Fever</option>
						<option>Relapsing</option>
					</select>
				</div>
			</div>
			<div class="col-md-5 d-flex align-items-end">
				<div class="mb-3 w-100">
					<input type="text" class="form-control" placeholder="Complaint History ( Enter Min 400 Words)">
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		setTimeout(function () {
            $('.select');
            setTimeout(function () {
                $('.select').select2({
                    minimumResultsForSearch: -1,
                    width: '100%'
                });
            }, 100);
        }, 100);

		$(".diagnosis-two-info").append(servicecontent);
		return false;
	});

	$(".diagnosis-two-info").on('click','.trash-icon', function () {
		$(this).closest('.diagnosis-two_details').remove();
		return false;
    });


	// add investigations
	$(".add-investigations").on('click', function () {

		var servicecontent = `
		<div class="row investigations_details align-items-center">
			<div class="col-md-12 d-flex align-items-end">
				<div class="mb-3 w-100">
					<input type="text" class="form-control">
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		$(".investigations-info").append(servicecontent);
		return false;
	});

	$(".investigations-info").on('click','.trash-icon', function () {
		$(this).closest('.investigations_details').remove();
		return false;
    });

	// add advice
	$(".add-advice").on('click', function () {

		var servicecontent = `
		<div class="row advice_details align-items-center">
			<div class="col-md-12 d-flex align-items-end">
				<div class="mb-3 w-100">
					<input type="text" class="form-control">
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		$(".advice-info").append(servicecontent);
		return false;
	});

	$(".advice-info").on('click','.trash-icon', function () {
		$(this).closest('.advice_details').remove();
		return false;
    });


	// add follow
	$(".add-follow").on('click', function () {

		var servicecontent = `

		<div class="row follow_details align-items-center">
		    <div class="col-md-12">
				<hr class="mt-0 mb-3">
			</div>
			<div class="col-md-6">
				<div class="mb-md-3">
					<label class="form-label mb-md-0">Next Consultation</label>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-3">
					<select class="select">
						<option>Select</option>
						<option>Yes</option>
						<option>No</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-md-3">
					<label class="form-label mb-md-0">Whether to come on empty Stomach?</label>
				</div>
			</div>
			<div class="col-md-6 d-flex align-items-end">
				<div class="mb-3 w-100">
					<select class="select">
						<option>Select</option>
						<option>Yes</option>
						<option>No</option>
					</select>
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		setTimeout(function () {
            $('.select');
            setTimeout(function () {
                $('.select').select2({
                    minimumResultsForSearch: -1,
                    width: '100%'
                });
            }, 100);
        }, 100);

		$(".follow-info").append(servicecontent);
		return false;
	});

	$(".follow-info").on('click','.trash-icon', function () {
		$(this).closest('.follow_details').remove();
		return false;
    });


	// add invoice
	$(".add-invoice").on('click', function () {

		var servicecontent = `

		<div class="row invoice_details align-items-center">
			<div class="col-md-12 d-flex align-items-end">
				<div class="mb-3 w-100">
					<input type="text" class="form-control">
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		setTimeout(function () {
            $('.select');
            setTimeout(function () {
                $('.select').select2({
                    minimumResultsForSearch: -1,
                    width: '100%'
                });
            }, 100);
        }, 100);

		$(".invoice-info").append(servicecontent);
		return false;
	});

	$(".invoice-info").on('click','.trash-icon', function () {
		$(this).closest('.invoice_details').remove();
		return false;
    });


	// add vitals
		$(".add-vitals").on('click', function () {

		var servicecontent = `

		<div class="row vitals_details">
			<div class="col-12">
		       <hr class="mt-0">
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Temprature<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">F</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Pulse<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">mmHg</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Respiratory Rate<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">rpm</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">SPO2<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">%</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Height<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Weight<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">Kg</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">BMI<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">kg/cm</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6">
				<div class="mb-3">
					<label class="form-label">Waist<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="col-xl-4 col-md-6 d-flex align-items-end">
				<div class="mb-3 w-100">
					<label class="form-label">BSA<span class="text-danger ms-1">*</span></label>
					<div class="input-group">
						<input type="text" class="form-control">
						<span class="input-group-text">M</span>
					</div>
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		$(".vitals-info").append(servicecontent);
		return false;
	});

	$(".vitals-info").on('click','.trash-icon', function () {
		$(this).closest('.vitals_details').remove();
		return false;
    });


	// add Complaint

		$(".add-complaint").on('click', function () {

		var servicecontent = `

		<div class="row complaint_details align-items-center">
		    <div class="col-12">
		       <hr class="mt-0">
			</div>
			<div class="col-md-2">
				<div class="mb-md-3">
					<label class="form-label mb-md-0">Fever</label>
				</div>
			</div>
			<div class="col-md-10 d-flex align-items-end">
				<div class="mb-3 w-100">
					<input type="text" class="form-control" placeholder="Add Symptoms">
				</div>
				<a href="javascript:void(0);" class="text-danger ms-2 mb-4 d-flex align-items-center trash-icon rounded-circle bg-soft-danger p-1"><i class="ti ti-trash fs-12"></i></a>
			</div>
		</div>

		`;

		$(".complaint-info").append(servicecontent);
		return false;
	});

	$(".complaint-info").on('click','.trash-icon', function () {
		$(this).closest('.complaint_details').remove();
		return false;
    });

	// Add new Scedule
    $(document).on('click', '.add-schedule-btn', function (e) {
    e.preventDefault();

    const newComplaint = `
        <div class="add-schedule-list mt-3 mt-lg-0">
            <div class="row gx-3 align-items-center">
                <div class="col-lg-8">
                    <div class="row gx-3">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">From</label>
                                <div class="input-icon-end position-relative">
                                    <input type="text" class="form-control timepicker-input" placeholder="-- : -- : --">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-clock-hour-10 text-dark"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">To</label>
                                <div class="input-icon-end position-relative">
                                    <input type="text" class="form-control timepicker-input" placeholder="-- : -- : --">
                                    <span class="input-icon-addon">
                                        <i class="ti ti-clock-hour-10 text-dark"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 d-flex align-items-center">
                    <div class="form-check form-switch w-100">
                        <input class="form-check-input" type="checkbox" role="switch">
                        <label class="form-check-label">Online Bookings</label>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <a href="javascript:void(0);" class="btn btn-sm add-schedule-btn p-1 bg-light btn-icon text-dark rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ti ti-plus fs-16"></i>
                        </a>
                        <a href="#" class="btn p-1 remove-schedule-btn bg-soft-danger btn-icon btn-sm text-danger rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ti ti-trash fs-16"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    `;

    // Insert after current one
    const $newItem = $(newComplaint);
    $(this).closest('.add-schedule-list').after($newItem);

    // ✅ Initialize timepickr (flatpickr or similar)
    $newItem.find('.timepicker-input').each(function () {
        flatpickr(this, {
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true
        });
    });

});


    // Remove Scedule
    $(document).on('click', '.remove-schedule-btn', function (e) {
        e.preventDefault();
        $(this).closest('.add-schedule-list').remove();
    });


	// awards slider
		if($('.awards-slider').length > 0) {
			$('.awards-slider').slick({
				infinite: true,
				slidesToShow: 2,
				slidesToScroll: 1,
				responsive: [
					{
					breakpoint: 576,
					settings: {
						slidesToShow: 1,
					}
					},
				]
			});
		}

		// visit slider

		$('#view_modal').on('shown.bs.modal', function () {
			var $slider = $('.visit-slider');

			if (!$slider.hasClass('slick-initialized')) {
				$slider.slick(); // Initialize if not already
			} else {
				$slider.slick('setPosition'); // Refresh layout
			}
		});

			// All Booking Calendar

	if($('#calendar-appointment').length > 0) {
		document.addEventListener('DOMContentLoaded', function() {
			var calendarEl = document.getElementById('calendar-appointment');

			var calendar = new FullCalendar.Calendar(calendarEl, {
			  initialView: 'dayGridMonth',
			  events: [
				{
				  title: '',
				  images: [
					{ url: 'assets/img/users/user-01.jpg', data: 'James Carter - 10:00 AM to 11:00 AM' },
					{ url: 'assets/img/users/user-02.jpg', data: 'Sophia Wilson - 10:30 AM to 11:30 AM' }
				  ],
				  backgroundColor: 'rgba(0, 0, 0, .2)',
				  start: new Date($.now() - 168000000).toJSON().slice(0, 10)
				},
				{
					title: '',
					images: [
					  { url: 'assets/img/users/user-03.jpg', data: 'Thomas -  10:00 AM to 11:00 AM' },
					  { url: 'assets/img/users/user-04.jpg', data: 'Shaver - 10:30 AM to 11:30 AM' },
					  { url: 'assets/img/users/user-05.jpg', data: 'Ann - 10:00 AM to 11:00 AM' },
					  { url: 'assets/img/users/user-06.jpg', data: 'Claffin - 11:00 AM to 12:00 PM' },
					  { url: 'assets/img/users/user-07.jpg', data: 'Enrique - 12:30 PM to 01:30 PM' }
					],
					backgroundColor: 'rgba(0, 0, 0, .2)',
					start: new Date($.now() + 338000000).toJSON().slice(0, 10)
				  },
				  {
					  title: '',
					  images: [
						{ url: 'assets/img/users/user-08.jpg', data: 'David Smith -  10:00 AM to 11:00 AM' },
						{ url: 'assets/img/users/user-09.jpg', data: 'Deacon - 10:30 AM to 11:30 AM' },
						{ url: 'assets/img/users/user-10.jpg', data: 'Stone - 10:00 AM to 11:00 AM' },
						{ url: 'assets/img/users/user-11.jpg', data: ' Evans - 11:00 AM to 12:00 PM' }
					  ],
					  backgroundColor: 'rgba(0, 0, 0, .2)',
					  start: new Date($.now() - 338000000).toJSON().slice(0, 10)
				  },
				  {
					  title: '',
					  images: [
						{ url: 'assets/img/users/user-12.jpg', data: 'Daniel Williams -  10:00 AM to 11:00 AM' },
						{ url: 'assets/img/users/user-13.jpg', data: 'Deacon - 10:30 AM to 11:30 AM' },
						{ url: 'assets/img/users/user-14.jpg', data: 'Stone - 10:00 AM to 11:00 AM' },
						{ url: 'assets/img/users/user-15.jpg', data: ' Evans - 11:00 AM to 12:00 PM' }
					  ],
					  backgroundColor: 'rgba(0, 0, 0, .2)',
					  start: new Date($.now() + 68000000).toJSON().slice(0, 10)
				  }
			  ],
			  headerToolbar: {
				start: 'title',
				end: 'prev,today,next'
			  },
			  eventDidMount: function(info) {
				var eventEl = info.el;
				var tdEl = eventEl.closest('td');
				if (tdEl) {
				  tdEl.style.backgroundColor = info.event.backgroundColor;
				}
				var eventEl = info.el;
				var images = info.event.extendedProps.images;
				var imagesHtml = images.slice(0, 2).map(function(imageData) {
				  return '<img class="fc-event-image avatar avatar-sm rounded-circle calendar-img" src="' + imageData.url + '" alt="' + imageData.tooltip + '" data-bs-toggle="tooltip" data-bs-placement="top" title="' + imageData.data + '">';
				}).join('');
				var moreImagesHtml = images.slice(2).map(function(imageData) {
				  return '<div class="d-flex align-items-center avatar avatar-sm rounded-circle cal-img"><img class="fc-event-image calendar-img" src="' + imageData.url + '"  alt="' + imageData.data + '" data-bs-toggle="tooltip" data-bs-placement="top" title="' + imageData.tooltip + '" style="display: none;"><span style="display:none;">' + imageData.data + '</span></div>';
				}).join('');

				var showMoreLink = '';
if (images.length > 2) {
  showMoreLink = '<a href="javascript:void(0);" class="show-more">Show more</a>';

  // Build custom popover content
  var popoverContent = `
    <div class="calendar-popover">
      <div class="calendar-popover-header d-flex justify-content-between align-items-center mb-2">
        <strong>${info.event.start.toLocaleDateString(undefined, { weekday: 'long', day: 'numeric' })}</strong>
        <button type="button" class="btn-close popover-close" aria-label="Close"></button>
      </div>
      <div class="calendar-popover-body">
        ${images.map(image => `
          <div class="calendar-popover-item d-flex align-items-center justify-content-between mb-2">
            <div class="d-flex align-items-center">
              <img src="${image.url}" class="rounded-circle avatar avatar-sm me-2" style="width: 32px; height: 32px;" />
              <span class="fw-medium">${image.data.split('-')[0].trim()}</span>
            </div>
            <div class="text-muted small">${image.data.split('-')[1].trim()}</div>
          </div>
        `).join('')}
      </div>
    </div>
  `;

  // Create popover
  const popover = new bootstrap.Popover(eventEl, {
    title: '',
    content: popoverContent,
    trigger: 'click',
    placement: 'auto',
    container: 'body',
    html: true
  });

  // Listen for when the popover is shown
  eventEl.addEventListener('shown.bs.popover', function () {
    const popoverId = eventEl.getAttribute('aria-describedby');
    const popoverEl = document.getElementById(popoverId);
    const closeBtn = popoverEl?.querySelector('.popover-close');

    if (closeBtn) {
      closeBtn.addEventListener('click', function () {
        popover.hide();
      });
    }
  });
}


				var imagesContainer = document.createElement('div');
				imagesContainer.innerHTML = imagesHtml + moreImagesHtml + showMoreLink;
				eventEl.querySelector('.fc-event-title-container').appendChild(imagesContainer);
				var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
				var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
				  return new bootstrap.Tooltip(tooltipTriggerEl);
				});
			  }
			});

			calendar.render();
		});
	}

	// Toggle Password
	if ($('.toggle-password').length > 0) {
		$(document).on('click', '.toggle-password', function () {
		  const $icon = $(this).find('i');
		  const $input = $(this).closest('.input-group').find('.pass-input');

		  if ($input.attr('type') === 'password') {
			$input.attr('type', 'text');
			$icon.removeClass('ti-eye-off').addClass('ti-eye');
		  } else {
			$input.attr('type', 'password');
			$icon.removeClass('ti-eye').addClass('ti-eye-off');
		  }
		});
	}




	// Datetimepicker
	if($('.datetimepicker').length > 0 ){
		$('.datetimepicker').datetimepicker({
			format: 'DD-MM-YYYY',
			icons: {
				up: "ti ti-chevron-up",
				down: "ti ti-chevron-down",
				next: 'ti ti-chevron-right',
				previous: 'ti ti-chevron-left'
			}
		});
	}



	if ($('.timepicker').length > 0) {
		$('.timepicker').datetimepicker({
			format: 'HH:mm A',
			icons: {
				up: "fas fa-angle-up",
				down: "fas fa-angle-down",
				next: 'fas fa-angle-right',
				previous: 'fas fa-angle-left'
			}
		});
	}

	// year picker

		if($('.yearpicker').length > 0 ){
		$('.yearpicker').datetimepicker({
			viewMode: 'years',
			format: 'YYYY',

			icons: {
				up: "ti ti-chevron-up",
				down: "ti ti-chevron-down",
				next: 'ti ti-chevron-right',
				previous: 'ti ti-chevron-left'
			}
		});
	}


		// Add new medication input on '+' click
	$(document).on('click', '.add-medication', function (e) {
		e.preventDefault();

		const newComplaint = `

		 <div class="row medication-list-item">
			<div class="col-xl-3 col-md-6">
			<div class="mb-3">
				<label class="form-label">Type</label>
				<select class="select">
					<option>Select</option>
					<option>Allergy</option>
					<option>Fever</option>
				</select>
			</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="mb-3">
					<label class="form-label">Date of Illness</label>
					<div class="input-group w-auto input-group-flat">
						<input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y">
						<span class="input-group-text">
							<i class="ti ti-calendar"></i>
						</span>
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-md-6">
				<div class="mb-3">
					<label class="form-label">Reason</label>
					<input type="text" class="form-control">
				</div>
			</div>
			<div class="col-xl-3 col-md-6 d-flex align-items-end">
				<div class="mb-3 w-100">
					<label class="form-label">Hospital Name</label>
					<input type="text" class="form-control">
				</div>
				<div class="mb-3">
					<label class="form-label mb-1 text-dark fs-14 fw-medium"></label>
					<a href="#" class="remove-medication ms-2 p-2 bg-light text-danger rounded d-flex align-items-center justify-content-center"><i class="ti ti-trash fs-16"></i></a>
			    </div>
			</div>
			<div class="col-md-12">
				<div class="mb-3 border-bottom pb-2">
					<div class="form-check mb-2">
						<input type="checkbox" class="form-check-input" id="customCheck5">
						<label class="form-check-label form-label mb-0" for="customCheck5">Assessment done if any</label>
					</div>
					<div class="form-check mb-2">
						<input type="checkbox" class="form-check-input" id="customCheck6">
						<label class="form-check-label form-label mb-0" for="customCheck6">Notes</label>
					</div>
					<div class="form-check mb-2">
						<input type="checkbox" class="form-check-input" id="customCheck7">
						<label class="form-check-label form-label mb-0" for="customCheck7">Documents If any</label>
					</div>
				</div>
			</div>
		</div>
		`;

		setTimeout(function () {
            $('.select');
            setTimeout(function () {
                $('.select').select2({
                    minimumResultsForSearch: -1,
                    width: '100%'
                });
            }, 100);
        }, 100);

setTimeout(function () {
	document.querySelectorAll('[data-provider="flatpickr"]').forEach(el => {
		const config = {
			disableMobile: true
		};

		if (el.hasAttribute('data-date-format')) {
			config.dateFormat = el.getAttribute('data-date-format');
		}

		if (el.hasAttribute('data-enable-time')) {
			config.enableTime = true;
			config.dateFormat = config.dateFormat ? `${config.dateFormat} H:i` : 'Y-m-d H:i';
		}

		if (el.hasAttribute('data-altFormat')) {
			config.altInput = true;
			config.altFormat = el.getAttribute('data-altFormat');
		}

		if (el.hasAttribute('data-minDate')) {
			config.minDate = el.getAttribute('data-minDate');
		}

		if (el.hasAttribute('data-maxDate')) {
			config.maxDate = el.getAttribute('data-maxDate');
		}

		if (el.hasAttribute('data-default-date')) {
			config.defaultDate = el.getAttribute('data-default-date');
		}

		if (el.hasAttribute('data-multiple-date')) {
			config.mode = 'multiple';
		}

		if (el.hasAttribute('data-range-date')) {
			config.mode = 'range';
		}

		if (el.hasAttribute('data-inline-date')) {
			config.inline = true;
			config.defaultDate = el.getAttribute('data-inline-date');
		}

		if (el.hasAttribute('data-disable-date')) {
			config.disable = el.getAttribute('data-disable-date').split(',');
		}

		if (el.hasAttribute('data-week-number')) {
			config.weekNumbers = true;
		}

		flatpickr(el, config);
	});
}, 100);

		// Insert before the add button row
		$(this).closest('.medication-list-item').before(newComplaint);
	});

	// Remove invest input on trash icon click
	$(document).on('click', '.remove-medication', function (e) {
		e.preventDefault();
		$(this).closest('.medication-list-item').remove();
	});


		// Date Range Picker
	if($('#reportrange').length > 0) {
		var start = moment().subtract(29, "days"),
			end = moment();

		function report_range(start, end) {
			$("#reportrange span").html(start.format("D MMM YY") + " - " + end.format("D MMM YY"))
		}
		$("#reportrange").daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
			}
		}, report_range), report_range(end, end);
	}

	if($('.reportrange').length > 0) {
		var start = moment().subtract(29, "days"),
			end = moment();

		function report_range(start, end) {
			$(".reportrange span").html(start.format("D MMM YY") + " - " + end.format("D MMM YY"))
		}
		$(".reportrange").daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
			}
		}, report_range), report_range(end, end);
	}

	// Custom Country Code Selector

	if ($('.phone').length > 0) {
		document.querySelectorAll(".phone").forEach(function (input) {
		  window.intlTelInput(input, {
			utilsScript: "assets/plugins/intltelinput/js/utils.js",
		  });
		});
	}

	// Select Table Checkbox

	var selectAllItems = "#select-all";
	var checkboxItem = ".form-check.form-check-md :checkbox";
	$(selectAllItems).on('click', function(){
		if (this.checked) {
		$(checkboxItem).each(function() {
			this.checked = true;
		});
		} else {
		$(checkboxItem).each(function() {
			this.checked = false;
		});
		}

	});
	var selectAllItems = "#select-all-2";
	var checkboxItem = ".form-check.form-check-md :checkbox";
	$(selectAllItems).on('click', function(){
		if (this.checked) {
		$(checkboxItem).each(function() {
			this.checked = true;
		});
		} else {
		$(checkboxItem).each(function() {
			this.checked = false;
		});
		}

	});

	var selectAllItems = "#select-all-3";
	var checkboxItem = ".form-check.form-check-md :checkbox";
	$(selectAllItems).on('click', function(){
		if (this.checked) {
		$(checkboxItem).each(function() {
			this.checked = true;
		});
		} else {
		$(checkboxItem).each(function() {
			this.checked = false;
		});
		}

	});

	// full screen
    if($('.btnFullscreen').length > 0) {
		const btnFullscreenElements = document.getElementsByClassName('btnFullscreen');

		// Add an event listener to each element
		Array.from(btnFullscreenElements).forEach(element => {
			element.addEventListener('click', function() {
				toggleFullscreen();
			});
		});

		// Function to toggle fullscreen mode
		function toggleFullscreen() {
			if (!document.fullscreenElement) {
				document.documentElement.requestFullscreen();
			} else {
				if (document.exitFullscreen) {
					document.exitFullscreen();
				}
			}
		}
	}

	// hide show
	$(document).ready(function() {
		// Hide on page load
		$(".hours-rate-main").hide();

		if ($('.hours-rate-btn').length > 0) {
		$(".hours-rate-btn").on("click", function() {
			$(".hours-rate-main").show(); // Show the section
			$(this).addClass("hours-rate-btn-close");
		});

		$(".reset-promote").on("click", function() {
			$(".hours-rate-main").hide(); // Hide on reset
			$(".hours-rate-btn").removeClass("hours-rate-btn-close");
		});
		}
	});

	// Play & Pause Icon

	if($('.play-icon').length > 0) {
		$(".play-icon").on("click", function () {
			$(this).toggleClass("pause bg-warning");
			$(this).find("i").toggleClass("ti-player-play-filled ti-player-stop-filled");
		});
	}

	$('.select-group').each(function () {
		var $card = $(this);
		var $selectAll = $card.find('.selectall'); // your select all checkbox
		var $checkboxes = $card.find('.form-check.form-check-md :checkbox').not($selectAll);

		$selectAll.on('click', function () {
			$checkboxes.prop('checked', this.checked);
		});
	});

	// Aprrearence Settings
	$('.theme-image').on('click', function(){
		$('.theme-image').removeClass('active');
		$(this).addClass('active');
	});

	// Add More rows
	document.addEventListener('DOMContentLoaded', () => {
		const tableBody = document.querySelector('#item-table tbody');
		const addButton = document.getElementById('add-item-btn');

		if (tableBody && addButton) {
			// Add more rows
			addButton.addEventListener('click', () => {
				const newRow = `
				<tr>
					<td><input type="text" class="form-control"></td>
					<td><input type="number" class="form-control" placeholder="Qty"></td>
					<td><input type="text" class="form-control"></td>
					<td>
						<div class="input-group">
							<input type="text" class="form-control">
							<span class="input-group-text bg-transparent">
								<i class="ti ti-currency-dollar"></i>
							</span>
						</div>
					</td>
					<td>
						<div class="input-group">
							<input type="text" class="form-control">
							<span class="input-group-text bg-transparent">
								<i class="ti ti-percentage"></i>
							</span>
						</div>
					</td>
					<td><input type="text" class="form-control"></td>
					<td class="ps-0">
						<select class="form-select form-select-sm">
							<option value="1">%</option>
							<option value="2">$</option>
						</select>
					</td>
					<td class="text-gray-9 fw-14 fw-medium">$0.00</td>
					<td><a href="javascript:void(0);" class="delete-row link-danger"><i class="ti ti-trash"></i></a></td>
				</tr>`;

				tableBody.insertAdjacentHTML('beforeend', newRow);
			});

			// Remove row on trash icon click
			document.addEventListener('click', (e) => {
				if (e.target.closest('.delete-row')) {
					e.target.closest('tr').remove();
				}
			});
		}
	});

	// Sticky Sidebar

	if ($(window).width() > 767) {
		if ($('.theiaStickySidebar').length > 0) {
			$('.theiaStickySidebar').theiaStickySidebar({
				// Settings
				additionalMarginTop: 30
			});
		}
	}


	// Date Range Picker
	if($('.daterangepick').length > 0) {
		var start = moment().subtract(29, "days"),
			end = moment();

		function report_range(start, end) {
			$(".daterangepick span").html(start.format("D MMM YY") + " - " + end.format("D MMM YY"))
		}
		$(".daterangepick").daterangepicker({
			startDate: start,
			endDate: end,
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, "days"), moment().subtract(1, "days")],
				"Last 7 Days": [moment().subtract(6, "days"), moment()],
				"Last 30 Days": [moment().subtract(29, "days"), moment()],
				"This Month": [moment().startOf("month"), moment().endOf("month")],
				"Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")]
			}
		}, report_range), report_range(end, end);
	}

	// fancy box
	if($('.screenshot-item').length > 0) {
		$( '[data-fancybox="gallery"]' ).fancybox({
			infobar : false,
			buttons: [
				"close"
			],
			caption : function( instance, item ) {
				var caption = $(this).data('caption') || '';

				return `
					${caption.length ? caption + '<br />' : ''}
			<div class="screenshot-info-top bg-dark position-fixed top-0 start-0 p-2 w-100">
				<div class="d-flex align-items-center justify-content-center">
					<a href="employee-details.html" class="avatar avatar-sm me-2 flex-shrink-0 avatar-rounded">
						<img src="assets/img/users/user-04.jpg" class="img-fluid" alt="img">
					</a>
					<span class="text-white">Ashley Regan -  24 Jan 2025, 09:01:00 AM</span>
				</div>
			 </div>
			<div class="screenshot-info-bottom text-center bg-dark position-fixed bottom-0 start-0 p-2 w-100">
				<div class="d-flex align-items-center mb-3 gap-3 justify-content-center flex-wrap">
					<div>
						<span class="text-white">Doccure Team</span>
						<i class="ti ti-point-filled text-primary mx-2"></i>
						<i class="ti ti-activity-heartbeat text-success me-2"></i>
						<span class="text-white">73% of 03 Min</span>
						<i class="ti ti-point-filled text-primary mx-2"></i>
						<span class="text-white">Doccure V1.0</span>
					</div>
					<div class="download-delete-icon ms-2">
						<a href="javascript:void(0);" class="btn p-0 avatar-xs btn-light text-dark rounded-pill"><i class="ti ti-download fs-13"></i></a>
						<a href="javascript:void(0);" class="btn p-0 avatar-xs btn-light text-dark rounded-pill"><i class="ti ti-trash fs-13"></i></a>
					</div>
				</div>
			   <div class="row justify-content-center">
					<div class="col-md-6">
						<div class="row row-gap-3">
							<div class="col-sm-6">
								<div>
									<div class="d-flex justify-content-between mb-1 text-white">
										<div>
											<i class="ti ti-keyboard me-1"></i>
											<span>Keystroke / Min</span>
										</div>
										<span>69</span>
									</div>
									<div class="progress-stacked progress-xs w-100">
										<div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div>
									<div class="d-flex justify-content-between mb-1 text-white">
										<div>
											<i class="ti ti-mouse me-1"></i>
											<span>Mouse Moments / Min</span>
										</div>
										<span>169</span>
									</div>
									<div class="progress-stacked progress-xs w-100">
										<div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
			   </div>
			</div>`;
			}
		});
	}

	// Card Drag
	if($('.kanban-drag-wrap').length > 0) {
        $(".kanban-drag-wrap").sortable({
            connectWith: ".kanban-drag-wrap",
            handle: ".kanban-card",
            placeholder: "drag-placeholder"
        });
    }


	// Select
	$('.select-group').each(function () {
		const $group = $(this);
		const $selectAll = $group.find('.selectall');
		const $checkboxes = $group.find('.form-check-md');

		$selectAll.on('click', function () {
			$checkboxes.prop('checked', this.checked);
		});
	});

	// Select 2
	$('.select-group2').each(function () {
		const $group = $(this);
		const $selectAll = $group.find('.selectall2');
		const $checkboxes = $group.find('.form-check-md2');

		$selectAll.on('click', function () {
			$checkboxes.prop('checked', this.checked);
		});
	});

	// Select 3
	$('.select-group3').each(function () {
		const $group = $(this);
		const $selectAll = $group.find('.selectall3');
		const $checkboxes = $group.find('.form-check-md3');

		$selectAll.on('click', function () {
			$checkboxes.prop('checked', this.checked);
		});
	});

	// Otp Verfication  
	$('.digit-group').find('input').each(function () {
		$(this).attr('maxlength', 1);
		$(this).on('keyup', function (e) {
			var parent = $($(this).parent());
			if (e.keyCode === 8 || e.keyCode === 37) {
			var prev = parent.find('input#' + $(this).data('previous'));
		if (prev.length) {
			$(prev).select();
		}
		}
		else if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {  
			var next = parent.find('input#' + $(this).data('next'));
			if (next.length) {
				$(next).select();
				} else {
				if (parent.data('autosubmit')) {
					parent.submit();
				}
			}
		}
		});
	});
	$('.digit-group input').on('keyup', function () {
		var self = $(this);
		if (self.val() != '') {
		self.addClass('active');
		} else {
		self.removeClass('active');
		}
	});

	// Coming Soon

	if($('.comming-soon').length > 0) {
		// Get html elements
		let day = document.querySelector('.days');
		let hour = document.querySelector('.hours');
		let minute = document.querySelector('.minutes');
		let second = document.querySelector('.seconds');

		function setCountdown() {

		// Set countdown date
		let countdownDate = new Date('Aug 27, 2025 16:00:00').getTime();

		// Update countdown every second
		let updateCount = setInterval(function(){

			// Get today's date and time
			let todayDate = new Date().getTime();

			// Get distance between now and countdown date
			let distance = countdownDate - todayDate;

			let days = Math.floor(distance / (1000 * 60 * 60 *24));

			let hours = Math.floor(distance % (1000 * 60 * 60 *24) / (1000 * 60 *60));

			let minutes = Math.floor(distance % (1000 * 60 * 60 ) / (1000 * 60));

			let seconds = Math.floor(distance % (1000 * 60) / 1000);

			// Display values in html elements
			day.textContent = days;
			hour.textContent = hours;
			minute.textContent = minutes;
			second.textContent = seconds;

			// if countdown expires
			if(distance < 0){
				clearInterval(updateCount);
				document.querySelector(".comming-soon").innerHTML = '<h1>EXPIRED</h1>'
			}
		}, 1000)
		}

		setCountdown()
	}

	// Add new invoice input on '+' click
	$(document).on('click', '.add-invoices', function (e) {
		e.preventDefault();

		const newInvoice = `
			<tr class="invoices-list-item">
				<td><input type="text" class="form-control" /></td>
				<td><input type="text" class="form-control" /></td>
				<td><input type="number" class="form-control" /></td>
				<td><input type="number" class="form-control" /></td>
				<td><input type="text" class="form-control" readonly /></td>
				<td><button class="btn remove-invoices btn-sm border shadow-sm p-2 d-flex align-items-center justify-content-center rounded fs-14">
					<i class="ti ti-trash"></i>
				</button></td>
			</tr>
		`;

		// Insert before the last row (the add button row)
		$('.invoices-list tr:last').before(newInvoice);
	});
	// Add new invoice input on '+' click
	$(document).on('click', '.add-invoices-two', function (e) {
		e.preventDefault();

		const newInvoice = `
			<tr class="invoices-list-item">
				<td>
					<div class="input-table input-table-descripition">
						<input type="text" class="form-control">
					</div>
				</td>
				<td>
					<div>
						<input type="text" class="form-control">
					</div>
				</td>
				<td>
					<div>
						<input type="text" class="form-control">
					</div>
				</td>
				<td>
					<div>
						<select class="select">
							<option>0%</option>
							<option>5%</option>
						</select>
					</div>
				</td>
				<td>
					<div>
						<input type="text" class="form-control">
					</div>
				</td>
				<td>
					<a href="#" class="btn btn-icon btn-sm remove-invoices text-danger">
						<i class="ti ti-xbox-x"></i>
					</a>
				</td>
			</tr>
		`;

		// Insert before the last row (the add button row)
		$('.invoices-list-two tr:last').after(newInvoice);

		setTimeout(function () {
            $('.select');
            setTimeout(function () {
                $('.select').select2({
                    minimumResultsForSearch: -1,
                    width: '100%'
                });
            }, 100);
        }, 100);
	});
	// Add new invoice input on '+' click
	$(document).on('click', '.add-invoices-3', function (e) {
		e.preventDefault();

		const newInvoice = `
			<tr class="invoices-list-item">
				<td>
					<div class="input-table input-table-descripition">
						<input type="text" class="form-control">
					</div>
				</td>
				<td>
					<div>
						<input type="text" class="form-control">
					</div>
				</td>
				<td>
					<div>
						<input type="text" class="form-control">
					</div>
				</td>
				<td>
					<div>
						<select class="select">
							<option>0%</option>
							<option>5%</option>
						</select>
					</div>
				</td>
				<td>
					<div>
						<input type="text" class="form-control">
					</div>
				</td>
				<td>
					<a href="#" class="btn btn-icon btn-sm remove-invoices text-danger">
						<i class="ti ti-xbox-x"></i>
					</a>
				</td>
			</tr>
		`;

		// Insert before the last row (the add button row)
		$('.invoices-list-3 tr:last').after(newInvoice);

		setTimeout(function () {
            $('.select');
            setTimeout(function () {
                $('.select').select2({
                    minimumResultsForSearch: -1,
                    width: '100%'
                });
            }, 100);
        }, 100);
	});

	// Remove Invoices input on trash icon click
	$(document).on('click', '.remove-invoices', function (e) {
		e.preventDefault();
		$(this).closest('.invoices-list-item').remove();
	});

	$('.theme-image').on('click', function(){
		$('.theme-image').removeClass('active');
		$(this).addClass('active');
	});
	$('.themecolorset').on('click', function(){
		$('.themecolorset').removeClass('active');
		$(this).addClass('active');
	});

	// Add Comment

	if($('.add-comment').length > 0) {
		$(".add-comment").on("click", function() {
		  $(this).closest(".notes-editor").children(".note-edit-wrap").slideToggle();
		});
		$(".add-cancel").on("click", function() {
		  $(this).closest(".note-edit-wrap").slideUp();
		});
	}

	// Contact Wizard
	$(".add-info-fieldset .wizard-next-btn").on('click', function () { // Function Runs On NEXT Button Click
		$(this).closest('fieldset').next().fadeIn('slow');
		$(this).closest('fieldset').css({
			'display': 'none'
		});
		// Adding Class Active To Show Steps Forward;
		$('.progress-bar-wizard .active').removeClass('active').addClass('activated').next().addClass('active');
	});

	// Add Sign
	$(document).on('click', '.trash-sign', function () {
		$(this).closest('.sign-cont').remove();
		return false;
	});
	$(document).on('click','.add-sign',function(){

		var signcontent = '<div class="row sign-cont">' +
			'<div class="col-md-6">' +
				'<div class="form-wrap mb-3">' +
					'<input class="form-control" type="text" placeholder="Enter Name">' +
				'</div>' +
			'</div>' +
			'<div class="col-md-6">' +
				'<div class="d-flex align-items-center mb-3">' +
					'<div class="form-wrap w-100 me-3">' +
					'<input class="form-control" type="text" placeholder="Email Address">' +
					'</div>' +
					'<div class="input-btn">' +
						'<a href="javascript:void(0);" class="trash-sign"><i class="ti ti-trash"></i></a>' +
					'</div>' +
				'</div>' +
			'</div>' +
		'</div>';
		$(".sign-content").append(signcontent);
		return false;
	});

	$('#deleteReason').on('select2:select', function (e) {
		const value = e.params.data.id;
		if (value === 'others') {
			$('#otherReasonBox').slideDown();
		} else {
			$('#otherReasonBox').slideUp();
		}
	});

})();
