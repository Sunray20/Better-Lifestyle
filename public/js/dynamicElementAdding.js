
$(document).ready(function(){
    $('#sendSearchRequest').on('click', function(){
        let ingredientName = $('#search').val()
        console.log($('#search').val());
        if(ingredientName.length > 3)
        {
            $.ajax({
                url: '/search-ingredients',
                type: 'get',
                datatype: 'json',
                data : {
                    name: ingredientName
                },
                success: function (data) {
                    data.forEach(element => {
                        let newElement = '<span>'
                            + '<span>' + element['name'] + '</span>'
                            + '<a href="#" onclick="removeFromPossibleIngredientList(this)"><i class="fas fa-check"></i></a>'
                            + '</span>';
                        $('#possibleIngredients').append(newElement);
                    });
                }
            });
        }
    });
});

function addToIngredientList(elementToAdd)
{
    let createCheckbox = '<input class="form-check-input" type="checkbox" name="' + elementToAdd +'" checked>';
    let createLabel = '<label class="form-label" for="remember_me">' + elementToAdd + '</label>';


    let ingredientsContainer = $('#ingredients')[0];
    $(ingredientsContainer).append(createCheckbox);
    $(ingredientsContainer).append(createLabel);
}

function removeFromPossibleIngredientList(elementToRemove)
{
    // The name of the food
    let elementToAdd = $(elementToRemove).prev()[0];
    addToIngredientList($(elementToAdd).text());
    $('#possibleIngredients').empty();
    // Empty search bar
    $('#search').val('');
}
