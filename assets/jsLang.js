export default {

    /**
     * Fetches a translation by key if it exists.
     *
     * @param form
     */
    get: key => {
        const messages = JSON.parse(document.body.getAttribute('data-jslang'));

        if (typeof messages[key] === 'undefined') {
            return key;
        }

        return messages[key];
    },
};
