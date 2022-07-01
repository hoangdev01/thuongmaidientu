import React, { useEffect, useState, useContext } from 'react';
import {
  Box,
  Container,
  Flex,
  HStack,
  Input,
  StackDivider,
  Text,
  VStack,
} from '@chakra-ui/react';
import FBChat from '../social/FbChat';
import { Link } from 'react-router-dom';

import logo from '../../assets/logo.png';

import { BsSearch } from 'react-icons/bs';
import { AiOutlineShoppingCart } from 'react-icons/ai';
import { FaRegUser } from 'react-icons/fa';
import { AuthContext } from '../../contexts/AuthContext';

// const MenuBar = ['Tour', 'Contact', 'About'];

const MenuBar = [
  {
    name: 'Tour',
    path: '/tourList',
  },
  {
    name: 'Hotel',
    path: '/hotelList',
  },
  {
    name: 'Car rental',
    path: '/carHireList',
  },
];

const Header = () => {
  const [showMenu, setShowMenu] = useState(0);
  const [optionUser, setOptionUser] = useState(false);

  const {
    authState: { authLoading, isAuthenticated },
  } = useContext(AuthContext);

  const ScrollShowMenu = () => {
    window.scrollY >= 70 ? setShowMenu(true) : setShowMenu(false);
  };

  useEffect(() => {
    window.addEventListener('scroll', ScrollShowMenu);
  });

  return (
    <Container maxW={'full'} centerContent p={0} position={'relative'}>
      <VStack
        divider={<StackDivider borderColor="gray.300" />}
        w={'full'}
        spacing={0}
        inset={0}
        zIndex={1}
        h={'170px'}
      >
        <Box
          py={showMenu ? '0px' : '12px'}
          w={'full'}
          display={'flex'}
          justifyContent={'center'}
          bgColor={showMenu ? 'white' : 'var(--primary-color)'}
          position={showMenu ? 'fixed' : 'unset'}
          top={showMenu ? '0px' : '-84px'}
          boxShadow={showMenu ? '0 10px 50px 0 rgb(46 56 220 / 20%)' : 'unset'}
          transition={'all 0.3s ease'}
          zIndex={999}
        >
          <Box
            maxW={'1200px'}
            w={'full'}
            color={'white'}
            fontSize={'15px'}
            fontFamily={'sans-serif'}
            p={'10px'}
            shadow={showMenu ? 'sm' : 'unset'}
          >
            <Flex
              display={'flex'}
              alignItems={'center'}
              mx={'-15px'}
              px={'10px'}
            >
              <Box maxW={'185px'} px={'15px'} flex={1} w={'full'}>
                <Link to={'/'}>
                  <Box
                    style={{ backgroundImage: `url(${logo})` }}
                    h={'38px'}
                    w={'165px'}
                    bgSize={'cover'}
                    bgPosition={'center'}
                    bgRepeat={'no-repeat'}
                  ></Box>
                </Link>
              </Box>

              <Box px={'15px'} flex={1}>
                <HStack
                  justifyContent={'center'}
                  color={'black'}
                  fontWeight={'bold'}
                  fontSize={'16px'}
                  spacing={0}
                >
                  {MenuBar.map((menu, index) => (
                    <Link
                      to={menu.path}
                      key={index}
                      _hover={{ textDecoration: 'unset' }}
                    >
                      <Box
                        transition={'all 0.2s ease-in-out'}
                        px={'10px'}
                        py={'20px'}
                        key={index}
                        cursor={'pointer'}
                        _hover={{ color: 'black' }}
                        color={showMenu ? 'black' : 'white'}
                      >
                        {menu.name}
                      </Box>
                    </Link>
                  ))}
                </HStack>
              </Box>

              <Box minW={'185px'} px={'15px'}>
                <Box ml={'auto'} display={'flex'}>
                  <Box position={'relative'}>
                    <Box
                      mx={'15px'}
                      position={'relative'}
                      color={'#071c1f'}
                      shadow={'0 16px 32px 0 rgba(7, 28, 31, 0.1)'}
                    >
                      <Input
                        type={'text'}
                        h={'50px'}
                        pr={'50px'}
                        border={'1px'}
                        rounded={'none'}
                        mt={'0px !important'}
                        mb={'0px !important'}
                        placeholder={'Search here...'}
                        bg={'white'}
                        color={'#5C727D'}
                        _placeholder={{
                          color: '#5C727D',
                        }}
                        _focus={{ borderColor: '#0a9a7a', border: '1px' }}
                      />
                      <Box
                        color={'#071c1f'}
                        position={'absolute'}
                        top={'50%'}
                        transform={'translateY(-50%)'}
                        right={'10px'}
                      >
                        <BsSearch size={19} />
                      </Box>
                    </Box>
                  </Box>
                  <Box
                    shadow={'0 16px 32px 0 rgba(7, 28, 31, 0.1)'}
                    position={'relative'}
                    bgColor={'white'}
                    color={'#071c1f'}
                    minW={'25px'}
                    h={'50px'}
                    w={'50px'}
                    mr={'10px'}
                    transition={'all 0.3s linear'}
                    cursor={'pointer'}
                    display={'flex'}
                    alignItems={'center'}
                    justifyContent={'center'}
                    _hover={{
                      color: 'white',
                      backgroundColor: 'var(--hover-color)',
                    }}
                    onClick={() => setOptionUser(!optionUser)}
                  >
                    <Box
                      position={'absolute'}
                      right={'0px'}
                      minW={'150px'}
                      py={'10px'}
                      bg={'white'}
                      boxShadow={'sm'}
                      fontSize={'16px'}
                      color={'#5C727D'}
                      top={optionUser ? '102%' : '115%'}
                      // transition={'all 0.5s ease'}
                      opacity={optionUser ? '1' : '0'}
                      display={optionUser ? 'block' : 'none'}
                    >
                      <Link
                        to="/sign-in"
                        style={{
                          display: !isAuthenticated ? 'block' : 'none',
                        }}
                      >
                        <Box px={'15px'} py={'7px'}>
                          <Text
                            _hover={{
                              color: 'var(--hover-color)',
                            }}
                          >
                            Sign in
                          </Text>
                        </Box>
                      </Link>
                      <Link
                        to="/sign-up"
                        style={{
                          display: !isAuthenticated ? 'block' : 'none',
                        }}
                      >
                        <Box px={'15px'} py={'7px'}>
                          <Text
                            _hover={{
                              color: 'var(--hover-color)',
                            }}
                          >
                            Register
                          </Text>
                        </Box>{' '}
                      </Link>
                      <Link
                        to="/profile"
                        style={{
                          display: isAuthenticated ? 'block' : 'none',
                        }}
                      >
                        <Box px={'15px'} py={'7px'}>
                          <Text
                            _hover={{
                              color: 'var(--hover-color)',
                            }}
                          >
                            My Account
                          </Text>
                        </Box>
                      </Link>
                      <Link
                        to="/logout"
                        onClick={() => window.location.reload()}
                        style={{
                          display: isAuthenticated ? 'block' : 'none',
                        }}
                      >
                        <Box px={'15px'} py={'7px'}>
                          <Text
                            _hover={{
                              color: '#00c2cb',
                            }}
                          >
                            Logout
                          </Text>
                        </Box>
                      </Link>
                    </Box>
                    <FaRegUser size={20} />
                  </Box>
                  <Link to="/cart">
                    <Box
                      shadow={'0 16px 32px 0 rgba(7, 28, 31, 0.1)'}
                      bgColor={'white'}
                      color={'#071c1f'}
                      minW={'25px'}
                      h={'50px'}
                      w={'50px'}
                      transition={'all 0.3s linear'}
                      cursor={'pointer'}
                      display={'flex'}
                      alignItems={'center'}
                      justifyContent={'center'}
                      _hover={{
                        color: 'white',
                        backgroundColor: 'var(--hover-color)',
                      }}
                    >
                      <AiOutlineShoppingCart size={23} />
                    </Box>
                  </Link>
                </Box>
              </Box>
            </Flex>
          </Box>
        </Box>
      </VStack>
      <FBChat></FBChat>
    </Container>
  );
};

export default Header;
