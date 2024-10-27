export default function formatDate(dateString, trans) {
    const date = new Date(dateString);
    const day = date.getDate();
    const year = date.getFullYear();

    const months = trans.frontend.months || [];
    const month = months[date.getMonth()] || '';

    return `${day} ${month} ${year}`;
}
