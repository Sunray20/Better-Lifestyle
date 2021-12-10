
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

function addToIngredientList(elementToAdd, amount, unit)
{
    let createCheckbox = '<input class="form-check-input" type="checkbox" name="' + elementToAdd +'_'+ amount +'_'+ unit +'" checked>';
    let createLabel = '<label class="form-label">' + elementToAdd + '(' + amount + unit + ')</label>';

    let ingredientsContainer = $('#ingredients')[0];
    $(ingredientsContainer).append(createCheckbox);
    $(ingredientsContainer).append(createLabel);
}

function removeFromPossibleIngredientList(elementToRemove)
{
    let amount = document.getElementById("amount").value;
    let unit = $( "#unit option:selected" ).text();

    if(amount != '' && unit != '')
    {
        // The name of the food
        let elementToAdd = $(elementToRemove).prev()[0];
        addToIngredientList($(elementToAdd).text(), amount, unit);
        $('#possibleIngredients').empty();
        // Empty search bar
        $('#search').val('');
        document.getElementById('errorMessages').innerHTML = "";
    }
    else
    {
        document.getElementById('errorMessages').innerHTML = "<span class='text-danger'>The amount and unit fields are required!</span>";
    }
}
