import Form from 'form-backend-validation';
import format from 'date-fns/format';
import parseISO from 'date-fns/parseISO';

function formatDateTimeLocal(dateTime) {
    if (!dateTime) {
        return '';
    }

    const isoDate = parseISO(dateTime);
    const result = format(isoDate, 'yyyy-MM-dd\'T\'HH:mm:ss');

    return result;
}

class BookingForm extends Form {
    withData(data) {
        const bookingData = {
            room_id: data.room_id,
            customer_id: data.customer_id,
            checkin: formatDateTimeLocal(data.checkin),
            checkout: formatDateTimeLocal(data.checkout),
            price: data.customer_id,
        };

        return super.withData(bookingData);
    }
}



export default BookingForm;
