export function formatMoney(value) {
    return `R$ ${Number(value).toFixed(2)}`;
}

export function getErrorMessage(error) {
    if (error.response && error.response.data && error.response.data.message) {
        return error.response.data.message;
    }

    return error.message;
}
