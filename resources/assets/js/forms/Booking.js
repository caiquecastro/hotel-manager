import format from 'date-fns/format';
import addDays from 'date-fns/addDays';
import parseISO from 'date-fns/parseISO';
import setHours from 'date-fns/setHours';
import Form from 'form-backend-validation';
import setMinutes from 'date-fns/setMinutes';
import setSeconds from 'date-fns/setSeconds';

const DATE_TIME_FORMAT = 'yyyy-MM-dd\'T\'HH:mm:ss';

function formatDateTimeLocal(dateTime) {
    if (!dateTime) {
        return '';
    }

    return formatDateTime(parseISO(dateTime));
}

function formatDateTime(dateTime) {
    return format(dateTime, DATE_TIME_FORMAT);
}

function setFullHour(dateTime, hour) {
    return setSeconds(setMinutes(setHours(dateTime, hour), 0), 0);
}

class BookingForm extends Form {
    withData(data) {
        const today = formatDateTime(setFullHour(new Date(), 14));
        const tomorrow = formatDateTime(setFullHour(addDays(new Date(), 1), 12));

        const bookingData = {
            room_id: data.room_id,
            customer_id: data.customer_id,
            checkin: formatDateTimeLocal(data.checkin) || today,
            checkout: formatDateTimeLocal(data.checkout) || tomorrow,
            price: data.customer_id,
        };

        return super.withData(bookingData);
    }
}



export default BookingForm;
