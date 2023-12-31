<?php

if (!defined('__MOBI_HANDLER__')) {
    define('__MOBI_HANDLER__', 1);
}

require_once 'whois.parser.php';

class mobi_handler
{
    public function parse($data_str, $query)
    {
        $items = array(
                    'Domain Name:'                     => 'domain.name',
                    'Created On:'                      => 'domain.created',
                    'Expiration Date:'                 => 'domain.expires',
                    'Sponsoring Registrar:'            => 'domain.sponsor',
                    'Status:'                          => 'domain.status',
                    'Registrant ID:'                   => 'owner.handle',
                    'Registrant Name:'                 => 'owner.name',
                    'Registrant Organization:'         => 'owner.organization',
                    'Registrant Street1:'              => 'owner.address.address.0',
                    'Registrant Street2:'              => 'owner.address.address.1',
                    'Registrant Street3:'              => 'owner.address.address.2',
                    'Registrant City:'                 => 'owner.address.city',
                    'Registrant Postal Code:'          => 'owner.address.pcode',
                    'Registrant Country:'              => 'owner.address.country',
                    'Registrant Phone:'                => 'owner.phone',
                    'Registrant Email:'                => 'owner.email',
                    'Trademark Name:'                  => 'owner.trademark.name',
                    'Trademark Country:'               => 'owner.trademark.country',
                    'Date Trademark Registered:'       => 'owner.trademark.registered',
                    'Date Trademark Applied For:'      => 'owner.trademark.applied',
                    'Admin ID:'                        => 'admin.handle',
                    'Admin Name:'                      => 'admin.name',
                    'Admin Organiztion:'               => 'admin.organization',
                    'Admin Street1:'                   => 'admin.address.address.0',
                    'Admin Street2:'                   => 'admin.address.address.1',
                    'Admin Street2:'                   => 'admin.address.address.2',
                    'Admin City:'                      => 'admin.address.city',
                    'Admin Postal Code:'               => 'admin.address.pcode',
                    'Admin Country:'                   => 'admin.address.country',
                    'Admin Phone:'                     => 'admin.phone',
                    'Admin Email:'                     => 'admin.email',
                    'Tech Name:'                       => 'tech.name',
                    'Tech ID:'                         => 'tech.handle',
                    'Tech Street1:'                    => 'tech.address.address.0',
                    'Tech Street2:'                    => 'tech.address.address.1',
                    'Tech Street3:'                    => 'tech.address.address.2',
                    'Tech Postal Code:'                => 'tech.address.pcode',
                    'Tech City:'                       => 'tech.address.city',
                    'Tech Country:'                    => 'tech.address.country',
                    'Tech Phone:'                      => 'tech.phone',
                    'Tech FAX:'                        => 'tech.fax',
                    'Tech Email:'                      => 'tech.email',
                    'Name Server:'                     => 'domain.nserver.',
                      );

        $r['regrinfo'] = generic_parser_b($data_str['rawdata'], $items);

        if (!strncmp($data_str['rawdata'][0], 'WHOIS LIMIT EXCEEDED', 20)) {
            $r['regrinfo']['registered'] = 'unknown';
        }

        $r['regyinfo']['referrer'] = 'http://www.mtld.mobi/';
        $r['regyinfo']['registrar'] = 'Dot Mobi Registry';

        return ($r);
    }
}
