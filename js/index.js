// DataTable
$(document).ready(function () {
  $('#example').DataTable({
    "responsive": true,
    "scrollX": true,
    "searching": false,
    "ordering": false,
    "lengthChange": false,
    "pageLength": 5,
    "pagingType": "full_numbers",
    language: {
      paginate: {
        first: '«',
        previous: '‹',
        next: '›',
        last: '»'
      },
      aria: {
        paginate: {
          first: 'First',
          previous: 'Previous',
          next: 'Next',
          last: 'Last'
        }
      }
    }
  });
});



