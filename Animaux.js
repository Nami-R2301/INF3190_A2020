$(function validateFrom () {
    $("form[name='form']").validate( {
        nomAnimal: "required",
        typeAnimal: "required",
        ageAnimal: {
            required: true,
            ageAnimal: true
        },
        ecoleEnfant: {
            required: true,

        }

    })
});