<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        \DB::table('languages')->delete();

        \DB::table('languages')->insert(array(
                array('id' => 1, 'country' => 'Afghanistan', 'language' => 'Pashto', 'lang_code' => 'ps', 'country_phone_code' => '+93', 'currency' => 'AFN', 'flag_class' => 'flag-icon-af'),
                array('id' => 2, 'country' => 'Albania', 'language' => 'Albanian', 'lang_code' => 'sq', 'country_phone_code' => '+355', 'currency' => 'ALL', 'flag_class' => 'flag-icon-al'),
                array('id' => 3, 'country' => 'Algeria', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+213', 'currency' => 'DZD', 'flag_class' => 'flag-icon-dz'),
                array('id' => 4, 'country' => 'Andorra', 'language' => 'Catalan', 'lang_code' => 'ca', 'country_phone_code' => '+376', 'currency' => 'EUR', 'flag_class' => 'flag-icon-ad'),
                array('id' => 5, 'country' => 'Angola', 'language' => 'Portuguese', 'lang_code' => 'pt', 'country_phone_code' => '+244', 'currency' => 'AOA', 'flag_class' => 'flag-icon-ao'),
                array('id' => 6, 'country' => 'Antigua and Barbuda', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1268', 'currency' => 'XCD', 'flag_class' => 'flag-icon-ag'),
                array('id' => 7, 'country' => 'Argentina', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+54', 'currency' => 'ARS', 'flag_class' => 'flag-icon-ar'),
                array('id' => 8, 'country' => 'Armenia', 'language' => 'Armenian', 'lang_code' => 'hy', 'country_phone_code' => '+374', 'currency' => 'AMD', 'flag_class' => 'flag-icon-am'),
                array('id' => 9, 'country' => 'Australia', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+61', 'currency' => 'AUD', 'flag_class' => 'flag-icon-au'),
                array('id' => 10, 'country' => 'Austria', 'language' => 'German', 'lang_code' => 'de', 'country_phone_code' => '+43', 'currency' => 'EUR', 'flag_class' => 'flag-icon-at'),
                array('id' => 11, 'country' => 'Azerbaijan', 'language' => 'Azerbaijani', 'lang_code' => 'az', 'country_phone_code' => '+994', 'currency' => 'AZN', 'flag_class' => 'flag-icon-az'),
                array('id' => 12, 'country' => 'Bahamas', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1242', 'currency' => 'BSD', 'flag_class' => 'flag-icon-bs'),
                array('id' => 13, 'country' => 'Bahrain', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+973', 'currency' => 'BHD', 'flag_class' => 'flag-icon-bh'),
                array('id' => 14, 'country' => 'Bangladesh', 'language' => 'Bengali', 'lang_code' => 'bn', 'country_phone_code' => '+880', 'currency' => 'BDT', 'flag_class' => 'flag-icon-bd'),
                array('id' => 15, 'country' => 'Barbados', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1246', 'currency' => 'BBD', 'flag_class' => 'flag-icon-bb'),
                array('id' => 16, 'country' => 'Belarus', 'language' => 'Belarusian', 'lang_code' => 'be', 'country_phone_code' => '+375', 'currency' => 'BYN', 'flag_class' => 'flag-icon-by'),
                array('id' => 17, 'country' => 'Belgium', 'language' => 'Dutch', 'lang_code' => 'nl', 'country_phone_code' => '+32', 'currency' => 'EUR', 'flag_class' => 'flag-icon-be'),
                array('id' => 18, 'country' => 'Belize', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+501', 'currency' => 'BZD', 'flag_class' => 'flag-icon-bz'),
                array('id' => 19, 'country' => 'Benin', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+229', 'currency' => 'XOF', 'flag_class' => 'flag-icon-bj'),
                array('id' => 20, 'country' => 'Bhutan', 'language' => 'Dzongkha', 'lang_code' => 'dz', 'country_phone_code' => '+975', 'currency' => 'BTN', 'flag_class' => 'flag-icon-bt'),
                array('id' => 21, 'country' => 'Bolivia', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+591', 'currency' => 'BOB', 'flag_class' => 'flag-icon-bo'),
                array('id' => 22, 'country' => 'Bosnia and Herzegovina', 'language' => 'Bosnian', 'lang_code' => 'bs', 'country_phone_code' => '+387', 'currency' => 'BAM', 'flag_class' => 'flag-icon-ba'),
                array('id' => 23, 'country' => 'Botswana', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+267', 'currency' => 'BWP', 'flag_class' => 'flag-icon-bw'),
                array('id' => 24, 'country' => 'Brazil', 'language' => 'Portuguese', 'lang_code' => 'pt', 'country_phone_code' => '+55', 'currency' => 'BRL', 'flag_class' => 'flag-icon-br'),
                array('id' => 25, 'country' => 'Brunei', 'language' => 'Malay', 'lang_code' => 'ms', 'country_phone_code' => '+673', 'currency' => 'BND', 'flag_class' => 'flag-icon-bn'),
                array('id' => 26, 'country' => 'Bulgaria', 'language' => 'Bulgarian', 'lang_code' => 'bg', 'country_phone_code' => '+359', 'currency' => 'BGN', 'flag_class' => 'flag-icon-bg'),
                array('id' => 27, 'country' => 'Burkina Faso', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+226', 'currency' => 'XOF', 'flag_class' => 'flag-icon-bf'),
                array('id' => 28, 'country' => 'Burundi', 'language' => 'Kirundi', 'lang_code' => 'rn', 'country_phone_code' => '+257', 'currency' => 'BIF', 'flag_class' => 'flag-icon-bi'),
                array('id' => 29, 'country' => 'Cabo Verde', 'language' => 'Portuguese', 'lang_code' => 'pt', 'country_phone_code' => '+238', 'currency' => 'CVE','flag_class' => 'flag-icon-cv'),
                array('id' => 30, 'country' => 'Cambodia', 'language' => 'Khmer', 'lang_code' => 'km', 'country_phone_code' => '+855', 'currency' => 'KHR', 'flag_class' => 'flag-icon-kh'),
                array('id' => 31, 'country' => 'Cameroon', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+237', 'currency' => 'XAF', 'flag_class' => 'flag-icon-cm'),
                array('id' => 32, 'country' => 'Canada', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1', 'currency' => 'CAD', 'flag_class' => 'flag-icon-ca'),
                array('id' => 33, 'country' => 'Central African Republic', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+236', 'currency' => 'XAF', 'flag_class' => 'flag-icon-cf'),
                array('id' => 34, 'country' => 'Chad', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+235', 'currency' => 'XAF', 'flag_class' => 'flag-icon-td'),
                array('id' => 35, 'country' => 'Chile', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+56', 'currency' => 'CLP', 'flag_class' => 'flag-icon-cl'),
                array('id' => 36, 'country' => 'China', 'language' => 'Mandarin', 'lang_code' => 'zh', 'country_phone_code' => '+86', 'currency' => 'CNY', 'flag_class' => 'flag-icon-cn'),
                array('id' => 37, 'country' => 'Colombia', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+57', 'currency' => 'COP', 'flag_class' => 'flag-icon-co'),
                array('id' => 38, 'country' => 'Comoros', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+269', 'currency' => 'KMF', 'flag_class' => 'flag-icon-km'),
                array('id' => 39, 'country' => 'Congo (Congo-Brazzaville)', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+242', 'currency' => 'XAF', 'flag_class' => 'flag-icon-cg'),
                array('id' => 40, 'country' => 'Costa Rica', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+506', 'currency' => 'CRC', 'flag_class' => 'flag-icon-cr'),
                array('id' => 41, 'country' => 'Croatia', 'language' => 'Croatian', 'lang_code' => 'hr', 'country_phone_code' => '+385', 'currency' => 'HRK', 'flag_class' => 'flag-icon-hr'),
                array('id' => 42, 'country' => 'Cuba', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+53', 'currency' => 'CUP', 'flag_class' => 'flag-icon-cu'),
                array('id' => 43, 'country' => 'Cyprus', 'language' => 'Greek', 'lang_code' => 'el', 'country_phone_code' => '+357', 'currency' => 'EUR', 'flag_class' => 'flag-icon-cy'),
                array('id' => 44, 'country' => 'Czech Republic', 'language' => 'Czech', 'lang_code' => 'cs', 'country_phone_code' => '+420', 'currency' => 'CZK', 'flag_class' => 'flag-icon-cz'),
                array('id' => 45, 'country' => 'Denmark', 'language' => 'Danish', 'lang_code' => 'da', 'country_phone_code' => '+45', 'currency' => 'DKK', 'flag_class' => 'flag-icon-dk'),
                array('id' => 46, 'country' => 'Djibouti', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+253', 'currency' => 'DJF', 'flag_class' => 'flag-icon-dj'),
                array('id' => 47, 'country' => 'Dominica', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1767', 'currency' => 'XCD', 'flag_class' => 'flag-icon-dm'),
                array('id' => 48, 'country' => 'Dominican Republic', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+1809', 'currency' => 'DOP', 'flag_class' => 'flag-icon-do'),
                array('id' => 49, 'country' => 'East Timor', 'language' => 'Portuguese', 'lang_code' => 'pt', 'country_phone_code' => '+670', 'currency' => 'USD', 'flag_class' => 'flag-icon-tl'),
                array('id' => 50, 'country' => 'Ecuador', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+593', 'currency' => 'USD', 'flag_class' => 'flag-icon-ec'),
                array('id' => 51, 'country' => 'Egypt', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+20', 'currency' => 'EGP', 'flag_class' => 'flag-icon-eg'),
                array('id' => 52, 'country' => 'El Salvador', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+503', 'currency' => 'USD', 'flag_class' => 'flag-icon-sv'),
                array('id' => 53, 'country' => 'Equatorial Guinea', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+240', 'currency' => 'XAF', 'flag_class' => 'flag-icon-gq'),
                array('id' => 54, 'country' => 'Eritrea', 'language' => 'Tigrinya', 'lang_code' => 'ti', 'country_phone_code' => '+291', 'currency' => 'ERN', 'flag_class' => 'flag-icon-er'),
                array('id' => 55, 'country' => 'Estonia', 'language' => 'Estonian', 'lang_code' => 'et', 'country_phone_code' => '+372', 'currency' => 'EUR', 'flag_class' => 'flag-icon-ee'),
                array('id' => 56, 'country' => 'Eswatini', 'language' => 'Swati', 'lang_code' => 'ss', 'country_phone_code' => '+268', 'currency' => 'SZL', 'flag_class' => 'flag-icon-sz'),
                array('id' => 57, 'country' => 'Ethiopia', 'language' => 'Amharic', 'lang_code' => 'am', 'country_phone_code' => '+251', 'currency' => 'ETB', 'flag_class' => 'flag-icon-et'),
                array('id' => 58, 'country' => 'Fiji', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+679', 'currency' => 'FJD', 'flag_class' => 'flag-icon-fj'),
                array('id' => 59, 'country' => 'Finland', 'language' => 'Finnish', 'lang_code' => 'fi', 'country_phone_code' => '+358', 'currency' => 'EUR', 'flag_class' => 'flag-icon-fi'),
                array('id' => 60, 'country' => 'France', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+33', 'currency' => 'EUR', 'flag_class' => 'flag-icon-fr'),
                array('id' => 61, 'country' => 'Gabon', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+241', 'currency' => 'XAF', 'flag_class' => 'flag-icon-ga'),
                array('id' => 62, 'country' => 'Gambia', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+220', 'currency' => 'GMD', 'flag_class' => 'flag-icon-gm'),
                array('id' => 63, 'country' => 'Georgia', 'language' => 'Georgian', 'lang_code' => 'ka', 'country_phone_code' => '+995', 'currency' => 'GEL', 'flag_class' => 'flag-icon-ge'),
                array('id' => 64, 'country' => 'Germany', 'language' => 'German', 'lang_code' => 'de', 'country_phone_code' => '+49', 'currency' => 'EUR', 'flag_class' => 'flag-icon-de'),
                array('id' => 65, 'country' => 'Ghana', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+233', 'currency' => 'GHS', 'flag_class' => 'flag-icon-gh'),
                array('id' => 66, 'country' => 'Greece', 'language' => 'Greek', 'lang_code' => 'el', 'country_phone_code' => '+30', 'currency' => 'EUR', 'flag_class' => 'flag-icon-gr'),
                array('id' => 67, 'country' => 'Grenada', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1473', 'currency' => 'XCD', 'flag_class' => 'flag-icon-gd'),
                array('id' => 68, 'country' => 'Guatemala', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+502', 'currency' => 'GTQ', 'flag_class' => 'flag-icon-gt'),
                array('id' => 69, 'country' => 'Guinea', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+224', 'currency' => 'GNF', 'flag_class' => 'flag-icon-gn'),
                array('id' => 70, 'country' => 'Guinea-Bissau', 'language' => 'Portuguese', 'lang_code' => 'pt', 'country_phone_code' => '+245', 'currency' => 'XOF', 'flag_class' => 'flag-icon-gw'),
                array('id' => 71, 'country' => 'Guyana', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+592', 'currency' => 'GYD', 'flag_class' => 'flag-icon-gy'),
                array('id' => 72, 'country' => 'Haiti', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+509', 'currency' => 'HTG', 'flag_class' => 'flag-icon-ht'),
                array('id' => 73, 'country' => 'Honduras', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+504', 'currency' => 'HNL', 'flag_class' => 'flag-icon-hn'),
                array('id' => 74, 'country' => 'Hungary', 'language' => 'Hungarian', 'lang_code' => 'hu', 'country_phone_code' => '+36', 'currency' => 'HUF', 'flag_class' => 'flag-icon-hu'),
                array('id' => 75, 'country' => 'Iceland', 'language' => 'Icelandic', 'lang_code' => 'is', 'country_phone_code' => '+354', 'currency' => 'ISK', 'flag_class' => 'flag-icon-is'),
                array('id' => 76, 'country' => 'India', 'language' => 'Hindi', 'lang_code' => 'hi', 'country_phone_code' => '+91', 'currency' => 'INR', 'flag_class' => 'flag-icon-in'),
                array('id' => 77, 'country' => 'Indonesia', 'language' => 'Indonesian', 'lang_code' => 'id', 'country_phone_code' => '+62', 'currency' => 'IDR', 'flag_class' => 'flag-icon-id'),
                array('id' => 78, 'country' => 'Iran', 'language' => 'Persian', 'lang_code' => 'fa', 'country_phone_code' => '+98', 'currency' => 'IRR', 'flag_class' => 'flag-icon-ir'),
                array('id' => 79, 'country' => 'Iraq', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+964', 'currency' => 'IQD', 'flag_class' => 'flag-icon-iq'),
                array('id' => 80, 'country' => 'Ireland', 'language' => 'Irish', 'lang_code' => 'ga', 'country_phone_code' => '+353', 'currency' => 'EUR', 'flag_class' => 'flag-icon-ie'),
                array('id' => 81, 'country' => 'Israel', 'language' => 'Hebrew', 'lang_code' => 'he', 'country_phone_code' => '+972', 'currency' => 'ILS', 'flag_class' => 'flag-icon-il'),
                array('id' => 82, 'country' => 'Italy', 'language' => 'Italian', 'lang_code' => 'it', 'country_phone_code' => '+39', 'currency' => 'EUR', 'flag_class' => 'flag-icon-it'),
                array('id' => 83, 'country' => 'Jamaica', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1-876', 'currency' => 'JMD', 'flag_class' => 'flag-icon-jm'),
                array('id' => 84, 'country' => 'Japan', 'language' => 'Japanese', 'lang_code' => 'ja', 'country_phone_code' => '+81', 'currency' => 'JPY', 'flag_class' => 'flag-icon-jp'),
                array('id' => 85, 'country' => 'Jordan', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+962', 'currency' => 'JOD', 'flag_class' => 'flag-icon-jo'),
                array('id' => 86, 'country' => 'Kazakhstan', 'language' => 'Kazakh', 'lang_code' => 'kk', 'country_phone_code' => '+7', 'currency' => 'KZT', 'flag_class' => 'flag-icon-kz'),
                array('id' => 87, 'country' => 'Kenya', 'language' => 'Swahili', 'lang_code' => 'sw', 'country_phone_code' => '+254', 'currency' => 'KES', 'flag_class' => 'flag-icon-ke'),
                array('id' => 88, 'country' => 'Kiribati', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+686', 'currency' => 'AUD', 'flag_class' => 'flag-icon-ki'),
                array('id' => 89, 'country' => 'Kuwait', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+965', 'currency' => 'KWD', 'flag_class' => 'flag-icon-kw'),
                array('id' => 90, 'country' => 'Kyrgyzstan', 'language' => 'Kyrgyz', 'lang_code' => 'ky', 'country_phone_code' => '+996', 'currency' => 'KGS', 'flag_class' => 'flag-icon-kg'),
                array('id' => 91, 'country' => 'Laos', 'language' => 'Lao', 'lang_code' => 'lo', 'country_phone_code' => '+856', 'currency' => 'LAK', 'flag_class' => 'flag-icon-la'),
                array('id' => 92, 'country' => 'Latvia', 'language' => 'Latvian', 'lang_code' => 'lv', 'country_phone_code' => '+371', 'currency' => 'EUR', 'flag_class' => 'flag-icon-lv'),
                array('id' => 93, 'country' => 'Lebanon', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+961', 'currency' => 'LBP', 'flag_class' => 'flag-icon-lb'),
                array('id' => 94, 'country' => 'Lesotho', 'language' => 'Sesotho', 'lang_code' => 'st', 'country_phone_code' => '+266', 'currency' => 'LSL', 'flag_class' => 'flag-icon-ls'),
                array('id' => 95, 'country' => 'Liberia', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+231', 'currency' => 'LRD', 'flag_class' => 'flag-icon-lr'),
                array('id' => 96, 'country' => 'Libya', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+218', 'currency' => 'LYD', 'flag_class' => 'flag-icon-ly'),
                array('id' => 97, 'country' => 'Liechtenstein', 'language' => 'German', 'lang_code' => 'de', 'country_phone_code' => '+423', 'currency' => 'CHF', 'flag_class' => 'flag-icon-li'),
                array('id' => 98, 'country' => 'Lithuania', 'language' => 'Lithuanian', 'lang_code' => 'lt', 'country_phone_code' => '+370', 'currency' => 'EUR', 'flag_class' => 'flag-icon-lt'),
                array('id' => 99, 'country' => 'Luxembourg', 'language' => 'Luxembourgish', 'lang_code' => 'lb', 'country_phone_code' => '+352', 'currency' => 'EUR', 'flag_class' => 'flag-icon-lu'),
                array('id' => 100, 'country' => 'Madagascar', 'language' => 'Malagasy', 'lang_code' => 'mg', 'country_phone_code' => '+261', 'currency' => 'MGA', 'flag_class' => 'flag-icon-mg'),
                array('id' => 101, 'country' => 'Malawi', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+265', 'currency' => 'MWK', 'flag_class' => 'flag-icon-mw'),
                array('id' => 102, 'country' => 'Malaysia', 'language' => 'Malay', 'lang_code' => 'ms', 'country_phone_code' => '+60', 'currency' => 'MYR', 'flag_class' => 'flag-icon-my'),
                array('id' => 103, 'country' => 'Maldives', 'language' => 'Dhivehi', 'lang_code' => 'dv', 'country_phone_code' => '+960', 'currency' => 'MVR', 'flag_class' => 'flag-icon-mv'),
                array('id' => 104, 'country' => 'Mali', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+223', 'currency' => 'XOF', 'flag_class' => 'flag-icon-ml'),
                array('id' => 105, 'country' => 'Malta', 'language' => 'Maltese', 'lang_code' => 'mt', 'country_phone_code' => '+356', 'currency' => 'EUR', 'flag_class' => 'flag-icon-mt'),
                array('id' => 106, 'country' => 'Marshall Islands', 'language' => 'Marshallese', 'lang_code' => 'mh', 'country_phone_code' => '+692', 'currency' => 'USD', 'flag_class' => 'flag-icon-mh'),
                array('id' => 107, 'country' => 'Mauritania', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+222', 'currency' => 'MRU', 'flag_class' => 'flag-icon-mr'),
                array('id' => 108, 'country' => 'Mauritius', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+230', 'currency' => 'MUR', 'flag_class' => 'flag-icon-mu'),
                array('id' => 109, 'country' => 'Mexico', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+52', 'currency' => 'MXN', 'flag_class' => 'flag-icon-mx'),
                array('id' => 110, 'country' => 'Micronesia', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+691', 'currency' => 'USD', 'flag_class' => 'flag-icon-fm'),
                array('id' => 111, 'country' => 'Moldova', 'language' => 'Romanian', 'lang_code' => 'ro', 'country_phone_code' => '+373', 'currency' => 'MDL', 'flag_class' => 'flag-icon-md'),
                array('id' => 112, 'country' => 'Monaco', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+377', 'currency' => 'EUR', 'flag_class' => 'flag-icon-mc'),
                array('id' => 113, 'country' => 'Mongolia', 'language' => 'Mongolian', 'lang_code' => 'mn', 'country_phone_code' => '+976', 'currency' => 'MNT', 'flag_class' => 'flag-icon-mn'),
                array('id' => 114, 'country' => 'Montenegro', 'language' => 'Montenegrin', 'lang_code' => 'cn', 'country_phone_code' => '+382', 'currency' => 'EUR', 'flag_class' => 'flag-icon-me'),
                array('id' => 115, 'country' => 'Morocco', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+212', 'currency' => 'MAD', 'flag_class' => 'flag-icon-ma'),
                array('id' => 116, 'country' => 'Mozambique', 'language' => 'Portuguese', 'lang_code' => 'pt', 'country_phone_code' => '+258', 'currency' => 'MZN', 'flag_class' => 'flag-icon-mz'),
                array('id' => 117, 'country' => 'Myanmar', 'language' => 'Burmese', 'lang_code' => 'my', 'country_phone_code' => '+95', 'currency' => 'MMK', 'flag_class' => 'flag-icon-mm'),
                array('id' => 118, 'country' => 'Namibia', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+264', 'currency' => 'NAD', 'flag_class' => 'flag-icon-na'),
                array('id' => 119, 'country' => 'Nauru', 'language' => 'Nauruan', 'lang_code' => 'na', 'country_phone_code' => '+674', 'currency' => 'AUD', 'flag_class' => 'flag-icon-nr'),
                array('id' => 120, 'country' => 'Nepal', 'language' => 'Nepali', 'lang_code' => 'ne', 'country_phone_code' => '+977', 'currency' => 'NPR', 'flag_class' => 'flag-icon-np'),
                array('id' => 121, 'country' => 'Netherlands', 'language' => 'Dutch', 'lang_code' => 'nl', 'country_phone_code' => '+31', 'currency' => 'EUR', 'flag_class' => 'flag-icon-nl'),
                array('id' => 122, 'country' => 'New Zealand', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+64', 'currency' => 'NZD', 'flag_class' => 'flag-icon-nz'),
                array('id' => 123, 'country' => 'Nicaragua', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+505', 'currency' => 'NIO', 'flag_class' => 'flag-icon-ni'),
                array('id' => 124, 'country' => 'Niger', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+227', 'currency' => 'XOF', 'flag_class' => 'flag-icon-ne'),
                array('id' => 125, 'country' => 'Nigeria', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+234', 'currency' => 'NGN', 'flag_class' => 'flag-icon-ng'),
                array('id' => 126, 'country' => 'North Macedonia', 'language' => 'Macedonian', 'lang_code' => 'mk', 'country_phone_code' => '+389', 'currency' => 'MKD', 'flag_class' => 'flag-icon-mk'),
                array('id' => 127, 'country' => 'Norway', 'language' => 'Norwegian', 'lang_code' => 'no', 'country_phone_code' => '+47', 'currency' => 'NOK', 'flag_class' => 'flag-icon-no'),
                array('id' => 128, 'country' => 'Oman', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+968', 'currency' => 'OMR', 'flag_class' => 'flag-icon-om'),
                array('id' => 129, 'country' => 'Pakistan', 'language' => 'Urdu', 'lang_code' => 'ur', 'country_phone_code' => '+92', 'currency' => 'PKR', 'flag_class' => 'flag-icon-pk'),
                array('id' => 130, 'country' => 'Palau', 'language' => 'Palauan', 'lang_code' => 'pau', 'country_phone_code' => '+680', 'currency' => 'USD', 'flag_class' => 'flag-icon-pw'),
                array('id' => 131, 'country' => 'Palestine', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+970', 'currency' => 'ILS', 'flag_class' => 'flag-icon-ps'),
                array('id' => 132, 'country' => 'Panama', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+507', 'currency' => 'PAB', 'flag_class' => 'flag-icon-pa'),
                array('id' => 133, 'country' => 'Papua New Guinea', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+675', 'currency' => 'PGK', 'flag_class' => 'flag-icon-pg'),
                array('id' => 134, 'country' => 'Paraguay', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+595', 'currency' => 'PYG', 'flag_class' => 'flag-icon-py'),
                array('id' => 135, 'country' => 'Peru', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+51', 'currency' => 'PEN', 'flag_class' => 'flag-icon-pe'),
                array('id' => 136, 'country' => 'Philippines', 'language' => 'Filipino', 'lang_code' => 'fil', 'country_phone_code' => '+63', 'currency' => 'PHP', 'flag_class' => 'flag-icon-ph'),
                array('id' => 137, 'country' => 'Poland', 'language' => 'Polish', 'lang_code' => 'pl', 'country_phone_code' => '+48', 'currency' => 'PLN', 'flag_class' => 'flag-icon-pl'),
                array('id' => 138, 'country' => 'Portugal', 'language' => 'Portuguese', 'lang_code' => 'pt', 'country_phone_code' => '+351', 'currency' => 'EUR', 'flag_class' => 'flag-icon-pt'),
                array('id' => 139, 'country' => 'Qatar', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+974', 'currency' => 'QAR', 'flag_class' => 'flag-icon-qa'),
                array('id' => 140, 'country' => 'Romania', 'language' => 'Romanian', 'lang_code' => 'ro', 'country_phone_code' => '+40', 'currency' => 'RON', 'flag_class' => 'flag-icon-ro'),
                array('id' => 141, 'country' => 'Russia', 'language' => 'Russian', 'lang_code' => 'ru', 'country_phone_code' => '+7', 'currency' => 'RUB', 'flag_class' => 'flag-icon-ru'),
                array('id' => 142, 'country' => 'Rwanda', 'language' => 'Kinyarwanda', 'lang_code' => 'rw', 'country_phone_code' => '+250', 'currency' => 'RWF', 'flag_class' => 'flag-icon-rw'),
                array('id' => 143, 'country' => 'Saint Kitts and Nevis', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1-869', 'currency' => 'XCD', 'flag_class' => 'flag-icon-kn'),
                array('id' => 144, 'country' => 'Saint Lucia', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1-758', 'currency' => 'XCD', 'flag_class' => 'flag-icon-lc'),
                array('id' => 145, 'country' => 'Saint Vincent and the Grenadines', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1-784', 'currency' => 'XCD', 'flag_class' => 'flag-icon-vc'),
                array('id' => 146, 'country' => 'Samoa', 'language' => 'Samoan', 'lang_code' => 'sm', 'country_phone_code' => '+685', 'currency' => 'WST', 'flag_class' => 'flag-icon-ws'),
                array('id' => 147, 'country' => 'San Marino', 'language' => 'Italian', 'lang_code' => 'it', 'country_phone_code' => '+378', 'currency' => 'EUR', 'flag_class' => 'flag-icon-sm'),
                array('id' => 148, 'country' => 'Sao Tome and Principe', 'language' => 'Portuguese', 'lang_code' => 'pt', 'country_phone_code' => '+239', 'currency' => 'STN', 'flag_class' => 'flag-icon-st'),
                array('id' => 149, 'country' => 'Saudi Arabia', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+966', 'currency' => 'SAR', 'flag_class' => 'flag-icon-sa'),
                array('id' => 150, 'country' => 'Senegal', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+221', 'currency' => 'XOF', 'flag_class' => 'flag-icon-sn'),
                array('id' => 151, 'country' => 'Serbia', 'language' => 'Serbian', 'lang_code' => 'sr', 'country_phone_code' => '+381', 'currency' => 'RSD', 'flag_class' => 'flag-icon-rs'),
                array('id' => 152, 'country' => 'Seychelles', 'language' => 'Seychellois Creole', 'lang_code' => 'crs', 'country_phone_code' => '+248', 'currency' => 'SCR', 'flag_class' => 'flag-icon-sc'),
                array('id' => 153, 'country' => 'Sierra Leone', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+232', 'currency' => 'SLL', 'flag_class' => 'flag-icon-sl'),
                array('id' => 154, 'country' => 'Singapore', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+65', 'currency' => 'SGD', 'flag_class' => 'flag-icon-sg'),
                array('id' => 155, 'country' => 'Slovakia', 'language' => 'Slovak', 'lang_code' => 'sk', 'country_phone_code' => '+421', 'currency' => 'EUR', 'flag_class' => 'flag-icon-sk'),
                array('id' => 156, 'country' => 'Slovenia', 'language' => 'Slovene', 'lang_code' => 'sl', 'country_phone_code' => '+386', 'currency' => 'EUR', 'flag_class' => 'flag-icon-si'),
                array('id' => 157, 'country' => 'Solomon Islands', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+677', 'currency' => 'AUD', 'flag_class' => 'flag-icon-sb'),
                array('id' => 158, 'country' => 'Somalia', 'language' => 'Somali', 'lang_code' => 'so', 'country_phone_code' => '+252', 'currency' => 'SOS', 'flag_class' => 'flag-icon-so'),
                array('id' => 159, 'country' => 'South Africa', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+27', 'currency' => 'ZAR', 'flag_class' => 'flag-icon-za'),
                array('id' => 160, 'country' => 'South Korea', 'language' => 'Korean', 'lang_code' => 'ko', 'country_phone_code' => '+82', 'currency' => 'KRW', 'flag_class' => 'flag-icon-kr'),
                array('id' => 161, 'country' => 'Spain', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+34', 'currency' => 'EUR', 'flag_class' => 'flag-icon-es'),
                array('id' => 162, 'country' => 'Sri Lanka', 'language' => 'Sinhala', 'lang_code' => 'si', 'country_phone_code' => '+94', 'currency' => 'LKR', 'flag_class' => 'flag-icon-lk'),
                array('id' => 163, 'country' => 'Sudan', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+249', 'currency' => 'SDG', 'flag_class' => 'flag-icon-sd'),
                array('id' => 164, 'country' => 'Suriname', 'language' => 'Dutch', 'lang_code' => 'nl', 'country_phone_code' => '+597', 'currency' => 'SRD', 'flag_class' => 'flag-icon-sr'),
                array('id' => 165, 'country' => 'Sweden', 'language' => 'Swedish', 'lang_code' => 'sv', 'country_phone_code' => '+46', 'currency' => 'SEK', 'flag_class' => 'flag-icon-se'),
                array('id' => 166, 'country' => 'Switzerland', 'language' => 'German', 'lang_code' => 'de', 'country_phone_code' => '+41', 'currency' => 'CHF', 'flag_class' => 'flag-icon-ch'),
                array('id' => 167, 'country' => 'Syria', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+963', 'currency' => 'SYP', 'flag_class' => 'flag-icon-sy'),
                array('id' => 168, 'country' => 'Taiwan', 'language' => 'Mandarin', 'lang_code' => 'zh', 'country_phone_code' => '+886', 'currency' => 'TWD', 'flag_class' => 'flag-icon-tw'),
                array('id' => 169, 'country' => 'Tajikistan', 'language' => 'Tajik', 'lang_code' => 'tg', 'country_phone_code' => '+992', 'currency' => 'TJS', 'flag_class' => 'flag-icon-tj'),
                array('id' => 170, 'country' => 'Tanzania', 'language' => 'Swahili', 'lang_code' => 'sw', 'country_phone_code' => '+255', 'currency' => 'TZS', 'flag_class' => 'flag-icon-tz'),
                array('id' => 171, 'country' => 'Thailand', 'language' => 'Thai', 'lang_code' => 'th', 'country_phone_code' => '+66', 'currency' => 'THB', 'flag_class' => 'flag-icon-th'),
                array('id' => 172, 'country' => 'Togo', 'language' => 'French', 'lang_code' => 'fr', 'country_phone_code' => '+228', 'currency' => 'XOF', 'flag_class' => 'flag-icon-tg'),
                array('id' => 173, 'country' => 'Tonga', 'language' => 'Tongan', 'lang_code' => 'to', 'country_phone_code' => '+676', 'currency' => 'TOP', 'flag_class' => 'flag-icon-to'),
                array('id' => 174, 'country' => 'Trinidad and Tobago', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1-868', 'currency' => 'TTD', 'flag_class' => 'flag-icon-tt'),
                array('id' => 175, 'country' => 'Tunisia', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+216', 'currency' => 'TND', 'flag_class' => 'flag-icon-tn'),
                array('id' => 176, 'country' => 'Turkey', 'language' => 'Turkish', 'lang_code' => 'tr', 'country_phone_code' => '+90', 'currency' => 'TRY', 'flag_class' => 'flag-icon-tr'),
                array('id' => 177, 'country' => 'Turkmenistan', 'language' => 'Turkmen', 'lang_code' => 'tk', 'country_phone_code' => '+993', 'currency' => 'TMT', 'flag_class' => 'flag-icon-tm'),
                array('id' => 178, 'country' => 'Tuvalu', 'language' => 'Tuvaluan', 'lang_code' => 'tvl', 'country_phone_code' => '+688', 'currency' => 'AUD', 'flag_class' => 'flag-icon-tv'),
                array('id' => 179, 'country' => 'Uganda', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+256', 'currency' => 'UGX', 'flag_class' => 'flag-icon-ug'),
                array('id' => 180, 'country' => 'Ukraine', 'language' => 'Ukrainian', 'lang_code' => 'uk', 'country_phone_code' => '+380', 'currency' => 'UAH', 'flag_class' => 'flag-icon-ua'),
                array('id' => 181, 'country' => 'United Arab Emirates', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+971', 'currency' => 'AED', 'flag_class' => 'flag-icon-ae'),
                array('id' => 182, 'country' => 'United Kingdom', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+44', 'currency' => 'GBP', 'flag_class' => 'flag-icon-gb'),
                array('id' => 183, 'country' => 'United States', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+1', 'currency' => 'USD', 'flag_class' => 'flag-icon-us'),
                array('id' => 184, 'country' => 'Uruguay', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+598', 'currency' => 'UYU', 'flag_class' => 'flag-icon-uy'),
                array('id' => 185, 'country' => 'Uzbekistan', 'language' => 'Uzbek', 'lang_code' => 'uz', 'country_phone_code' => '+998', 'currency' => 'UZS', 'flag_class' => 'flag-icon-uz'),
                array('id' => 186, 'country' => 'Vanuatu', 'language' => 'Bislama', 'lang_code' => 'bi', 'country_phone_code' => '+678', 'currency' => 'VUV', 'flag_class' => 'flag-icon-vu'),
                array('id' => 187, 'country' => 'Vatican City', 'language' => 'Italian', 'lang_code' => 'it', 'country_phone_code' => '+39', 'currency' => 'EUR', 'flag_class' => 'flag-icon-va'),
                array('id' => 188, 'country' => 'Venezuela', 'language' => 'Spanish', 'lang_code' => 'es', 'country_phone_code' => '+58', 'currency' => 'VES', 'flag_class' => 'flag-icon-ve'),
                array('id' => 189, 'country' => 'Vietnam', 'language' => 'Vietnamese', 'lang_code' => 'vi', 'country_phone_code' => '+84', 'currency' => 'VND', 'flag_class' => 'flag-icon-vn'),
                array('id' => 190, 'country' => 'Yemen', 'language' => 'Arabic', 'lang_code' => 'ar', 'country_phone_code' => '+967', 'currency' => 'YER', 'flag_class' => 'flag-icon-ye'),
                array('id' => 191, 'country' => 'Zambia', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+260', 'currency' => 'ZMW', 'flag_class' => 'flag-icon-zm'),
                array('id' => 192, 'country' => 'Zimbabwe', 'language' => 'English', 'lang_code' => 'en', 'country_phone_code' => '+263', 'currency' => 'ZWL', 'flag_class' => 'flag-icon-zw'),
            )
        );
    }
}
