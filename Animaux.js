$(function validateFrom () {
    $("form[name='form']").validate( {
        nomParent: "required",
        nomEnfant: "required",
        age: {
            age: true
        },
        ecoleEnfant: {
            required: true,

        }

    })
});

function main() {
    const form = document.querySelector('form');
    const data = new FormData(form);
}