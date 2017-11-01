$(document).ready(function() {
	$("#nroClienteDiv").hide();
});

function showNroCliente() {
	if ($("#rol").val() == 2) {
		$("#nroClienteDiv").show();
	} else {
		$("#nroClienteDiv").hide();
	}
}

function addField() {
	var objectInput = "<input class=\"form-control\" type=\"text\" name=\"objeto[]\" id=\"txt_contenido_li\" value=\"Ingrese Objeto\">";
	$("#lista").append(objectInput);
};

/*


$(document).ready(function(){
	$("#txt_contenido_li").focus();
	$("#btn_agregar").click(function() {
		var objectInput = "<input class=\"form-control\" type=\"text\" name=\"objeto[]\" id=\"txt_contenido_li\" value=\"Ingrese Objeto\">";
		$("#lista").append(objectInput);
		$("#txt_contenido_li").val("").focus();
	});
});


$(document).ready(function() {
    $("#add").click(function() {
        var intId = $("#buildyourform div").length + 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        var fName = $("<input type=\"text\" class=\"fieldname\" />");
        var fType = $("<select class=\"fieldtype\"><option value=\"checkbox\">Checked</option><option value=\"textbox\">Text</option><option value=\"textarea\">Paragraph</option></select>");
        var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
    $("#preview").click(function() {
        $("#yourform").remove();
        var fieldSet = $("<fieldset id=\"yourform\"><legend>Your Form</legend></fieldset>");
        $("#buildyourform div").each(function() {
            var id = "input" + $(this).attr("id").replace("field","");
            var label = $("<label for=\"" + id + "\">" + $(this).find("input.fieldname").first().val() + "</label>");
            var input;
            switch ($(this).find("select.fieldtype").first().val()) {
                case "checkbox":
                    input = $("<input type=\"checkbox\" id=\"" + id + "\" name=\"" + id + "\" />");
                    break;
                case "textbox":
                    input = $("<input type=\"text\" id=\"" + id + "\" name=\"" + id + "\" />");
                    break;
                case "textarea":
                    input = $("<textarea id=\"" + id + "\" name=\"" + id + "\" ></textarea>");
                    break;    
            }
            fieldSet.append(label);
            fieldSet.append(input);
        });
        $("body").append(fieldSet);
    });
});*/