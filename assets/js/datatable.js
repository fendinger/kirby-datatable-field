(function($) {
  var Datatablefield = function (table) {
    table.addClass('dataTable');
    var table = table.DataTable({
    });
  };
  $.fn.datatablefield = function () {
    return this.each(function () {
      if ($(this).data('datatablefield')) {
        return $(this);
      } else {
        var datatablefield = new Datatablefield($(this).find('table'));
        $(this).data('datatablefield', datatablefield);
        return $(this);
      }
    });
  };
})(jQuery);