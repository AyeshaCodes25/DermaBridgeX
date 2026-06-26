document.addEventListener("DOMContentLoaded", function () {

    const chatbot = document.getElementById("chatbot");
    const chatBody = document.getElementById("chatBody");

    // Chatbot inside dont close
    chatbot.addEventListener("click", function (event) {
        event.stopPropagation();
    });

    // Toggle function
    window.toggleChatbot = function (event) {
        if (event) event.stopPropagation();

        chatbot.style.display =
            chatbot.style.display === "block" ? "none" : "block";
    };

    // Questions
    const qa = [
        ["What causes acne?", "Acne is caused by excess oil production, clogged pores, bacteria, and hormonal changes."],
        ["How can I treat acne at home?", "Use gentle cleansers, avoid oily products, and apply salicylic acid or benzoyl peroxide."],
        ["Why is my skin dry?", "Dry skin can be due to weather, dehydration, or lack of moisturization."],
        ["How to cure dry skin?", "Use a hydrating moisturizer, drink water, and avoid harsh soaps."],
        ["What causes dark spots?", "Dark spots are caused by sun exposure, acne scars, or aging."],
        ["How can I remove dark spots?", "Use sunscreen, vitamin C serum, and consult a dermatologist for treatment."],
        ["What is eczema?", "Eczema is a condition that makes skin inflamed, itchy, and irritated."],
        ["How to treat eczema?", "Use medicated creams, avoid triggers, and keep skin moisturized."],
        ["Why is my skin oily?", "Overactive sebaceous glands produce excess oil."],
        ["How to control oily skin?", "Use oil-free products, wash face twice daily, and use toner."],
        ["What causes hair fall?", "Hair fall can be due to stress, hormones, or poor nutrition."],
        ["How to reduce hair fall?", "Maintain a healthy diet, use mild shampoo, and reduce stress."],
        ["What is sunburn?", "Sunburn is skin damage caused by UV radiation from the sun."],
        ["How to treat sunburn?", "Apply aloe vera, stay hydrated, and avoid further sun exposure."],
        ["What are wrinkles?", "Wrinkles are signs of aging caused by loss of skin elasticity."],
        ["How to prevent wrinkles?", "Use sunscreen, moisturize, and avoid smoking."],
        ["What is pigmentation?", "Pigmentation refers to uneven skin color or dark patches."],
        ["How to improve skin glow?", "Maintain hydration, eat healthy, and follow skincare routine."],
        ["Is sunscreen necessary?", "Yes, sunscreen protects your skin from harmful UV rays."],
        ["When should I see a dermatologist?", "If your skin condition persists or worsens, consult a doctor."]
    ];

    qa.forEach((item) => {
        let q = document.createElement("div");
        q.className = "question";
        q.innerText = item[0];

        let a = document.createElement("div");
        a.className = "answer";
        a.innerText = item[1];

        q.onclick = () => {
            a.style.display =
                a.style.display === "block" ? "none" : "block";
        };

        chatBody.appendChild(q);
        chatBody.appendChild(a);
    });

});

// outside chatbot close
document.addEventListener("click", function (event) {
    const chatbot = document.getElementById("chatbot");
    const chatbotBtn = document.getElementById("chatbotBtn");

    if (
        !chatbot.contains(event.target) &&
        !chatbotBtn.contains(event.target)
    ) {
        chatbot.style.display = "none";
    }
});