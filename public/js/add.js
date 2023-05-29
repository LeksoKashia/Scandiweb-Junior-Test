$(document).ready(function() {
  $('#productType').change(function(){
    $('#dvd-fields').toggle($(this).val() == 'DVD');
    $('#book-fields').toggle($(this).val() == 'Book');
    $('#furniture-fields').toggle($(this).val() == 'Furniture');
  });
});


$('.main-form').submit(function(event) {
  const selector = $('.selector');
  const inputs = [$('.sku'), $('.name'), $('.price')];
  const visibleInputs = [];

  // Add visible inputs to the array
  if ($('#furniture-fields').is(':visible')) {
    visibleInputs.push($('.height'), $('.width'), $('.length'));
  }
  if ($('#dvd-fields').is(':visible')) {
    visibleInputs.push($('.size'));
  }
  if ($('#book-fields').is(':visible')) {
    visibleInputs.push($('.weight'));
  }
  for (const input of inputs) {
    if (input.val() === '') {
      event.preventDefault();
      showErrorModal(`Please fill in the ${input.attr('placeholder')} field.`);
      return;
    }
  }

  for (const input of visibleInputs) {
    if (input.val() === '') {
      event.preventDefault();
      showErrorModal(`Please fill in the ${input.attr('placeholder')} field.`);
      return;
    }
  }



  if (!selector.val()) {
    showErrorModal('Please select an option.');
    event.preventDefault();
  }
});


function showErrorModal(message) {
  const modal = $('#my-modal');
  const modalText = $('#modal-text');
  modalText.text(message);
  modal.css('display', 'block');
  setTimeout(() => modal.css('display', 'none'), 1000);
}


