import { TranslationContext } from "@/contexts/TranslationProvider";
import React, { useContext } from "react";
import PricingCard from "../Components/PricingCard";
import SectionHeader from "../Components/SectionHeader";
import SectionHeaderTwo from "../Components/SectionHeaderTwo";
import SectionSubHeader from "../Components/SectionSubHeader";

function Pricing() {
    const member = [
        {
            en: "Access to a library of free coding tutorials",
            fr: "Accès à une bibliothèque de tutoriels de codage gratuits",
            ar: "الوصول إلى مكتبة دروس البرمجة المجانية",
        },
        {
            en: "Basic coding tricks and tips",
            fr: "Astuces et conseils de codage de base",
            ar: "حيل ونصائح أساسية في البرمجة",
        },
        {
            en: "Access to source code examples",
            fr: "Accès à des exemples de code source",
            ar: "الوصول إلى أمثلة من التعليمات البرمجية المصدر",
        },
        {
            en: "Community forum participation",
            fr: "Participation au forum communautaire",
            ar: "المشاركة في منتدى المجتمع",
        },
    ];

    const student = [
        {
            en: "One-on-one mentoring with instructors",
            fr: "Mentorat individuel avec des instructeurs",
            ar: "التوجيه الفردي مع المدربين",
        },
        {
            en: "Exclusive student-only coding challenges",
            fr: "Défis de codage exclusifs pour étudiants",
            ar: "تحديات برمجية حصرية للطلاب",
        },
        {
            en: "Premium coding exercises with solutions",
            fr: "Exercices de codage premium avec solutions",
            ar: "تمارين برمجة متميزة مع حلول",
        },
        {
            en: "Access to recorded and live coding sessions",
            fr: "Accès aux sessions de codage enregistrées et en direct",
            ar: "الوصول إلى جلسات البرمجة المسجلة والمباشرة",
        },
    ];

    const subscriber = [
        {
            en: "Full access to expert-led video tutorials",
            fr: "Accès complet aux tutoriels vidéo dirigés par des experts",
            ar: "الوصول الكامل إلى دروس الفيديو التي يقودها الخبراء",
        },
        {
            en: "Advanced coding tricks and tips",
            fr: "Astuces et conseils de codage avancés",
            ar: "حيل ونصائح برمجية متقدمة",
        },
        {
            en: "Exclusive industry insights and career guidance",
            fr: "Aperçus exclusifs de l'industrie et conseils de carrière",
            ar: "رؤى حصرية حول الصناعة وإرشادات مهنية",
        },
        {
            en: "Early access to new coding resources and features",
            fr: "Accès anticipé aux nouvelles ressources et fonctionnalités de codage",
            ar: "الوصول المبكر إلى موارد وميزات البرمجة الجديدة",
        },
    ];

    const data = [
        {
            title_en: "Pack Member",
            title_fr: "Pack Membre",
            title_ar: "باقة العضو",
            description_en: "Enjoy free access to essential coding resources, tutorials, and community support.",
            description_fr:
                "Profitez d'un accès gratuit aux ressources essentielles de codage, aux tutoriels et au support communautaire.",
            description_ar: "استمتع بوصول مجاني إلى موارد البرمجة الأساسية والدروس التعليمية ودعم المجتمع.",
            oldPrice_en: "0 DH",
            oldPrice_fr: "0 DH",
            oldPrice_ar: "0 د.م",
            price_en: "0 DH",
            price_fr: "0 DH",
            price_ar: "0 د.م",
            kind_en: "Lifetime Access",
            kind_fr: "Accès à vie",
            kind_ar: "وصول مدى الحياة",
            features: member,
        },
        {
            title_en: "Pack Student",
            title_fr: "Pack Étudiant",
            title_ar: "باقة الطالب",
            description_en:
                "Get exclusive benefits for students, including mentoring, challenges, and advanced exercises.",
            description_fr:
                "Bénéficiez d'avantages exclusifs pour étudiants, notamment du mentorat, des défis et des exercices avancés.",
            description_ar: "احصل على مزايا حصرية للطلاب، بما في ذلك الإرشاد والتحديات والتمارين المتقدمة.",
            oldPrice_en: "500 DH",
            oldPrice_fr: "500 DH",
            oldPrice_ar: "500 د.م",
            price_en: "299 DH",
            price_fr: "299 DH",
            price_ar: "299 د.م",
            kind_en: "Monthly Subscription",
            kind_fr: "Abonnement Mensuel",
            kind_ar: "اشتراك شهري",
            features: student,
        },
        {
            title_en: "Pack Subscriber",
            title_fr: "Pack Abonné",
            title_ar: "باقة المشترك",
            description_en: "Unlock premium access to expert-led courses, career insights, and advanced techniques.",
            description_fr:
                "Débloquez un accès premium aux cours dirigés par des experts, aux perspectives de carrière et aux techniques avancées.",
            description_ar: "افتح الوصول المتميز إلى الدورات التي يقودها الخبراء، ورؤى المهنة، والتقنيات المتقدمة.",
            oldPrice_en: "700 DH",
            oldPrice_fr: "700 DH",
            oldPrice_ar: "700 د.م",
            price_en: "500 DH",
            price_fr: "500 DH",
            price_ar: "500 د.م",
            kind_en: "Monthly Subscription",
            kind_fr: "Abonnement Mensuel",
            kind_ar: "اشتراك شهري",
            features: subscriber,
        },
    ];

    const { translations } = useContext(TranslationContext);

    const lang = localStorage.getItem("lang") || "en";

    return (
        <div className="">
            <SectionHeaderTwo title={translations.plan_title} className="text-center" />

            <SectionSubHeader className="text-center">{translations.plan_sub}</SectionSubHeader>

            <div className="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0 items-center">
                {data?.map((p, index) => (
                    <PricingCard
                        key={index}
                        title={p[`title_${lang}`] || p.title_en}
                        description={p[`description_${lang}`] || p.description_en}
                        oldPrice={p[`oldPrice_${lang}`] || p.oldPrice_en}
                        price={p[`price_${lang}`] || p.price_en}
                        kind={p[`kind_${lang}`] || p.kind_en}
                        features={p.features.map((f) => f[lang] || f.en)}
                    />
                ))}
            </div>
        </div>
    );
}

export default Pricing;
