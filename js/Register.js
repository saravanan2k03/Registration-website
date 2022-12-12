$("#CheckBoxList1, #CheckBoxList2").on("change click", function (e) {
    if ($("#CheckBoxList1:checked, #CheckBoxList2:checked").length > 2) {
      e.preventDefault();
      // add additional error code here;
    }
  });
