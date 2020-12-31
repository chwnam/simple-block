import {registerBlockType} from '@wordpress/blocks';
import {__} from '@wordpress/i18n';

registerBlockType('simple-block/simple-block', {
    title: __('심플 블록', 'simple-block'),
    description: __('i18n 실험을 위한 워드프레스 커스텀 블록.', 'simple-block'),
    category: 'common',
    edit({className}) {
        return <p className={className}>{__('안녕하세요? 심플 블록 테스트입니다.', 'simple-block')}</p>;
    },
    save({className}) {
        return <p className={className}>{__('안녕하세요? 심플 블록 테스트입니다.', 'simple-block')}</p>;
    }
});
