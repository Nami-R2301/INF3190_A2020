let reg = new RegExp( '\,' )

jQuery.validator.addMethod("doesNotContain", function(value, element, param) {
    return this.optional(element) || !value.search(reg);
}, "Please specify a different (non-default) value");

$(function validateFrom () {
    $("form[name='form']").validate( {
        rules: {
            nomAnimal: {
                required: true,
                doesNotContain: true,
            },
            typeAnimal: "required",
            race: "required",
            ageAnimal: {
                required: true,
                ageAnimal: true
            },
            descriptionT: "required",
        }

    })
});