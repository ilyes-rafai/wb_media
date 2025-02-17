import Accordion from "@/Components/Accordion";
import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext } from "react";
import SectionHeader from "../Components/SectionHeader";
import SectionHeaderTwo from "../Components/SectionHeaderTwo";

function FAQ() {
    const { translations } = useContext(TranslationContext);

    const faqs = [
        {
            question_fr: "De quoi s'agit-il de cette plateforme?",
            question_en: "What is this platform about?",
            question_ar: "ما هذه المنصة؟",
            answer_fr:
                "Cette plateforme vous aide à améliorer vos compétences en codage grâce à des astuces, des quiz, des exercices, du vocabulaire et des cours vidéo.",
            answer_en:
                "This platform helps you improve your coding skills through tricks, quizzes, exercises, vocabulary, and video courses.",
            answer_ar:
                "تساعدك هذه المنصة على تحسين مهاراتك في البرمجة من خلال الحيل والاختبارات والتمارين والمفردات ودورات الفيديو.",
        },
        {
            question_fr: "Cette plateforme est-elle gratuite?",
            question_en: "Is this platform free to use?",
            question_ar: "هل هذه المنصة مجانية؟",
            answer_fr:
                "Oui! Nous offrons un plan gratuit avec accès aux astuces de codage et aux quiz de base. Les plans premium débloquent du contenu et des fonctionnalités avancés.",
            answer_en:
                "Yes! We offer a free plan with access to coding tricks and basic quizzes. Premium plans unlock advanced content and features.",
            answer_ar:
                "نعم! نحن نقدم خطة مجانية تتيح الوصول إلى حيل البرمجة والاختبارات الأساسية. تفتح الخطط المتميزة المحتوى والميزات المتقدمة.",
        },
        {
            question_fr: "À qui s'adresse cette plateforme?",
            question_en: "Who is this platform for?",
            question_ar: "لمن هذه المنصة؟",
            answer_fr:
                "Que vous soyez débutant, intermédiaire ou avancé, notre plateforme offre un apprentissage structuré pour vous aider à progresser.",
            answer_en:
                "Whether you're a beginner, intermediate, or advanced coder, our platform provides structured learning to help you grow.",
            answer_ar: "سواء كنت مبتدئًا أو متوسطًا أو متقدمًا، توفر منصتنا تعلّمًا منظمًا لمساعدتك على التطور.",
        },
        {
            question_fr: "Quels langages de programmation couvrez-vous?",
            question_en: "What programming languages do you cover?",
            question_ar: "ما هي لغات البرمجة التي تغطيها المنصة؟",
            answer_fr:
                "Nous couvrons des langages populaires comme JavaScript, Python, PHP, Laravel, et bien plus encore, avec du nouveau contenu ajouté régulièrement.",
            answer_en:
                "We cover popular languages like JavaScript, Python, PHP, Laravel, and more, with new content added regularly.",
            answer_ar:
                "نغطي لغات برمجة شائعة مثل JavaScript و Python و PHP و Laravel والمزيد، مع إضافة محتوى جديد بانتظام.",
        },
        {
            question_fr: "Comment accéder aux cours vidéo?",
            question_en: "How do I access the video courses?",
            question_ar: "كيف يمكنني الوصول إلى دورات الفيديو؟",
            answer_fr:
                "Vous pouvez accéder aux cours vidéo en vous inscrivant à un compte gratuit ou premium. Certains cours peuvent être exclusifs aux membres premium.",
            answer_en:
                "You can access video courses by signing up for a free or premium account. Some courses may be exclusive to premium members.",
            answer_ar:
                "يمكنك الوصول إلى دورات الفيديو عن طريق التسجيل للحصول على حساب مجاني أو متميز. قد تكون بعض الدورات حصرية للأعضاء المتميزين.",
        },
        {
            question_fr: "Est-ce que j'obtiens un certificat après avoir terminé un cours?",
            question_en: "Do I get a certificate after completing a course?",
            question_ar: "هل أحصل على شهادة بعد إكمال الدورة؟",
            answer_fr:
                "Actuellement, nous n'offrons pas de certificats, mais nous travaillons à ajouter cette fonctionnalité à l'avenir.",
            answer_en:
                "Currently, we don’t offer certificates, but we are working on adding this feature in the future.",
            answer_ar: "حاليًا، لا نقدم شهادات، لكننا نعمل على إضافة هذه الميزة في المستقبل.",
        },
        {
            question_fr: "Puis-je contribuer avec mes propres astuces de codage ou quiz?",
            question_en: "Can I contribute my own coding tricks or quizzes?",
            question_ar: "هل يمكنني المساهمة بخدع البرمجة الخاصة بي أو الاختبارات؟",
            answer_fr:
                "Absolument! Nous construisons une plateforme basée sur la communauté. Restez à l'écoute pour savoir comment contribuer.",
            answer_en: "Absolutely! We're building a community-driven platform. Stay tuned for ways to contribute.",
            answer_ar: "بالتأكيد! نحن نبني منصة مدفوعة بالمجتمع. تابعنا لمعرفة طرق المساهمة.",
        },
    ];

    return (
        <div>
            <SectionHeaderTwo title={translations.faq} className="text-center" />

            <Accordion faqs={faqs} />
        </div>
    );
}

export default FAQ;
