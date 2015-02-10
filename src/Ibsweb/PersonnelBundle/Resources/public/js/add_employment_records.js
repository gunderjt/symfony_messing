var $collectionHolder;

var $addErLink = $('<a href="#" class="add_employment_link">Add an Employment Record</a>');
var $newLinkLi = $('<li></li>').append($addErLink);

$(document).ready(function() {
  // Get the ul that holds the collection of Employment Records
  $collectionHolder = $('ul.employment_records');

  // add a delete link to all of the existing elements to the li
  $collectionHolder.find('li').each(function(){
    addErFormDeleteLink($(this));
  });

  // add the "add a employment" anchor and li to the ers ul
  $collectionHolder.append($newLinkLi);

  // count the current form inputs we have (e.g. 2), use that as the new
  // index when inserting a new item (e.g. 2)
  $collectionHolder.data('index', $collectionHolder.find(':input').length);

  $addErLink.on('click', function(e) {
    // prevent the link from creating a "#" on the URL
    e.preventDefault();

    // add a new er form (see next code block)
    addErForm($collectionHolder, $newLinkLi);
  });
});

function addErForm($collectionHolder, $newLinkLi) {
  // Get the data-prototype explained earlier
  var prototype = $collectionHolder.data('prototype');

  // get the new index
  var index = $collectionHolder.data('index');

  // Replace '__name__' in the prototype's HTML to
  // instead be a number based on how many items we have
  var newForm = prototype.replace(/__name__/g, index);

  // increase the index with one for the next item
  $collectionHolder.data('index', index + 1);

  // Display the form in the page in an li, before the "Add a er" link li
  var $newFormLi = $('<li></li>').append(newForm);
  $newLinkLi.before($newFormLi);

  // add a delete link to the new form
  addErFormDeleteLink($newFormLi);
}

function addErFormDeleteLink($erFormLi) {
  var $removeFormA = $('<a href="#">Delete this Employment Record</a>');
  $erFormLi.append($removeFormA);

  $removeFormA.on('click', function(e) {
    // prevent the link from creating a "#" on the URL
    e.preventDefault();

    // remove the li for the er form
    $erFormLi.remove();
  });
}
