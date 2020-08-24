/**
 * Created by dungphanxuan on 01/04/2017.
 */
function getSuggestPrice(iPrice) {
    var length = iPrice.length;

    if(length == 1 || length == 2){
        return '000 000'
    } else if (length == 3 || length == 4 || length == 5){
       return '000';
    }
    return '000';
}

function getSuggestQty(iQty) {
    var length = iQty.length;
    if(length == 1 || length == 2){
        return '0'
    }
    return '';
}
