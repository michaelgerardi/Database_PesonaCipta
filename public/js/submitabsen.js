var card = {
    "$schema": "http://adaptivecards.io/schemas/adaptive-card.json",
    "type": "AdaptiveCard",
    "version": "1.0",
    "body" :
    [
        {
            "type" : "date-now",
            "id" : "tanggal_masuk",
        },
        {
            "type" : "time",
            "id" : "jam_masuk",
        },
        {
            "type" : "form-select",
            "id" : "status"
        }
    ],
    "actions":
    [
        {
            "type" : "action.submit",
            "id" : "action.submit"
        }
    ]
};
